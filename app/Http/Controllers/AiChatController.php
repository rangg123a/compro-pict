<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'nullable|array|max:20',
            'history.*.role' => 'required_with:history|in:user,assistant',
            'history.*.content' => 'required_with:history|string|max:1000',
        ]);

        $apiKey = config('services.openrouter.key');

        if (!$apiKey) {
            return response()->json(['error' => 'API key belum dikonfigurasi di server.'], 500);
        }

        $history = $request->input('history', []);

        $systemPrompt = "You are an AI assistant for PT Patimban International Car Terminal (PICT), a Ro-Ro terminal at Patimban Port, West Java, Indonesia. Always reply in the SAME language the user writes in — if they write in Indonesian, reply in Indonesian; if in English, reply in English. Keep answers friendly, concise, and informative, focused on terminal services, port operations, and general information about Patimban Port.

IMPORTANT FORMATTING RULES:
- Reply using plain text only.
- Do NOT use Markdown formatting: no tables, no pipes (|), no asterisks for bold, no dashes as separator lines, no headers with #.
- For lists, use simple line breaks with a dash, like:
- Item one: short explanation
- Item two: short explanation
- Keep paragraphs short and easy to read in a small chat window.

ESCALATION RULE:
- If the user has already asked several questions (roughly 3 or more) in this conversation, or if the question is too specific/technical/personal for you to answer confidently (e.g. detailed pricing negotiation, contract terms, complaints, or account-specific issues), politely suggest they contact PICT directly via email at info@pict.co.id. Always write the email exactly as info@pict.co.id so it can be detected and linked automatically.";

        $messages = array_merge(
            [['role' => 'system', 'content' => $systemPrompt]],
            $history,
            [['role' => 'user', 'content' => $request->input('message')]]
        );

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'openai/gpt-oss-20b',
            'messages' => $messages,
        ]);

        if ($response->status() === 429) {
            return response()->json([
                'error' => 'Sistem sedang sibuk, silakan coba lagi sebentar lagi atau hubungi kami di info@pict.co.id',
            ], 429);
        }

        if ($response->failed()) {
            return response()->json([
                'error' => $response->json('error.message') ?? 'Gagal menghubungi AI.',
            ], $response->status());
        }

        return response()->json([
            'reply' => $response->json('choices.0.message.content') ?? 'Maaf, tidak ada respons.',
        ]);
    }
}