<!-- ═══ FLOATING AI CHATBOT WIDGET ═══ -->
<div id="ai-chat-widget" class="fixed bottom-5 left-4 sm:left-auto sm:right-4 sm:bottom-6 sm:right-6 z-50 transition-all duration-300">
    <button id="ai-chat-toggle" class="rounded-full shadow-2xl flex items-center justify-center transition transform hover:scale-105 focus:outline-none cursor-pointer overflow-hidden w-12 h-12 sm:w-14 sm:h-14 bg-white border-2 border-slate-100">
        <img src="{{ asset('assets/images/maskot-ai.png') }}" alt="PICT AI Assistant" class="w-full h-full object-cover">
    </button>

    <!-- Di mobile kotak chat terbuka ke arah kanan agar tidak terpotong dari sisi kiri layar -->
    <div id="ai-chat-box" class="hidden absolute bottom-16 sm:bottom-20 left-0 sm:left-auto sm:right-0 w-[calc(100vw-2rem)] sm:w-96 max-w-sm bg-white border border-slate-200 rounded-2xl shadow-2xl flex flex-col overflow-hidden h-[450px]">
        <div class="bg-slate-900 text-white px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <h4 class="font-bold text-sm">PICT AI Assistant</h4>
            </div>
            <button id="ai-chat-close" class="text-slate-400 hover:text-white text-sm font-bold cursor-pointer">&times;</button>
        </div>

        <div id="ai-chat-messages" class="flex-1 p-4 overflow-y-auto space-y-3 text-xs bg-slate-50">
            <div class="flex justify-start">
                <div class="bg-white border border-slate-200 text-slate-800 p-3 rounded-2xl rounded-tl-none shadow-sm max-w-[80%]">
                    Hello! How can I help you with terminal services or information about Patimban International Car Terminal?
                </div>
            </div>
        </div>

        <div class="p-3 bg-white border-t border-slate-200 flex gap-2">
            <input type="text" id="ai-chat-input" placeholder="Type a message..." class="flex-1 px-3 py-2 border border-slate-300 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-red-600 bg-slate-50">
            <button id="ai-chat-send" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer">Send</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('ai-chat-toggle');
    const closeBtn = document.getElementById('ai-chat-close');
    const chatBox = document.getElementById('ai-chat-box');
    const sendBtn = document.getElementById('ai-chat-send');
    const inputField = document.getElementById('ai-chat-input');
    const messagesContainer = document.getElementById('ai-chat-messages');
    const chatWidget = document.getElementById('ai-chat-widget');

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    let conversationHistory = [];
    let messageCounter = 0;

    toggleBtn.addEventListener('click', () => chatBox.classList.toggle('hidden'));
    closeBtn.addEventListener('click', () => chatBox.classList.add('hidden'));

    // Deteksi tombol scroll HANYA untuk layar desktop (lebar di atas 1024px)
    function checkScrollTopButton() {
        if (window.innerWidth < 1024) {
            // Di mobile, pastikan posisinya terkunci aman di kiri bawah
            chatWidget.classList.remove('right-20', 'sm:right-24', 'sm:right-4', 'sm:right-6');
            chatWidget.classList.add('left-4', 'sm:left-auto');
            return;
        }

        const allButtons = document.querySelectorAll('button, a');
        let scrollBtnFound = false;

        allButtons.forEach(el => {
            const rect = el.getBoundingClientRect();
            const isBottomRight = rect.bottom > (window.innerHeight - 100) && rect.right > (window.innerWidth - 100);
            if (isBottomRight && el !== toggleBtn && !chatWidget.contains(el)) {
                if (window.getComputedStyle(el).display !== 'none' && !el.classList.contains('hidden') && !el.classList.contains('opacity-0')) {
                    scrollBtnFound = true;
                }
            }
        });

        if (scrollBtnFound) {
            chatWidget.classList.remove('sm:right-4', 'sm:right-6', 'left-4');
            chatWidget.classList.add('sm:right-24');
        } else {
            chatWidget.classList.remove('sm:right-24', 'left-4');
            chatWidget.classList.add('sm:right-6');
        }
    }

    window.addEventListener('scroll', checkScrollTopButton);
    window.addEventListener('resize', checkScrollTopButton);
    setTimeout(checkScrollTopButton, 500);

    async function handleSendMessage() {
        const text = inputField.value.trim();
        if (!text) return;

        appendMessage(text, 'user');
        inputField.value = '';
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        const loadingId = appendMessage('Typing...', 'bot', true);

        try {
            const response = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    message: text,
                    history: conversationHistory
                })
            });

            const data = await response.json();
            document.getElementById(loadingId)?.remove();

            if (data.reply) {
                appendMessage(data.reply, 'bot');
                conversationHistory.push({ role: 'user', content: text });
                conversationHistory.push({ role: 'assistant', content: data.reply });
                if (conversationHistory.length > 20) {
                    conversationHistory = conversationHistory.slice(-20);
                }
            } else if (data.error) {
                appendMessage("AI Error: " + data.error, 'bot');
            } else {
                appendMessage("Sorry, there was an error in the server response.", 'bot');
            }
        } catch (error) {
            document.getElementById(loadingId)?.remove();
            appendMessage("Failed to connect to the server. Please check your connection.", 'bot');
        }
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    sendBtn.addEventListener('click', handleSendMessage);
    inputField.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') handleSendMessage();
    });

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function linkifyContactEmail(safeHtml) {
        const emailRegex = /info@pict\.co\.id/gi;
        return safeHtml.replace(
            emailRegex,
            '<a href="/contact" class="underline font-semibold text-red-600 hover:text-red-700">info@pict.co.id</a>'
        );
    }

    function appendMessage(text, sender, isLoading = false) {
        const msgDiv = document.createElement('div');
        messageCounter++;
        const uniqueId = 'msg-' + Date.now() + '-' + messageCounter + '-' + Math.random().toString(36).slice(2, 7);
        msgDiv.id = uniqueId;
        msgDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'}`;

        const bubble = document.createElement('div');
        bubble.className = sender === 'user' 
            ? 'bg-red-600 text-white p-3 rounded-2xl rounded-tr-none shadow-sm max-w-[80%] leading-relaxed' 
            : 'bg-white border border-slate-200 text-slate-800 p-3 rounded-2xl rounded-tl-none shadow-sm max-w-[80%] leading-relaxed';
        
        if (isLoading) {
            bubble.classList.add('italic', 'text-slate-400');
        }

        if (sender === 'bot' && !isLoading) {
            const safe = escapeHtml(text);
            bubble.innerHTML = linkifyContactEmail(safe).replace(/\n/g, '<br>');
        } else {
            bubble.textContent = text;
        }

        msgDiv.appendChild(bubble);
        messagesContainer.appendChild(msgDiv);
        return uniqueId;
    }
});
</script>