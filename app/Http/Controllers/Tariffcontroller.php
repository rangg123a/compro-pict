<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * Force-download the Domestic Tariff PDF.
     */
    public function downloadDomestik()
    {
        $path = public_path('assets/pdf/Domestic_Tariff_2026.pdf');

        abort_unless(file_exists($path), 404, 'Domestic tariff file not found.');

        return response()->download($path, 'Domestic_Tariff_2026.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Force-download the International Tariff PDF.
     */
    public function downloadInternasional()
    {
        $path = public_path('assets/pdf/International_Tariff_2026.pdf');

        abort_unless(file_exists($path), 404, 'International tariff file not found.');

        return response()->download($path, 'International_Tariff_2026.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}