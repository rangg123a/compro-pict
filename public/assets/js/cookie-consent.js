window.addEventListener('DOMContentLoaded', function () {
    // Pastikan library sudah termuat
    if (typeof CookieConsent !== 'undefined') {
        CookieConsent.run({
            current_lang: 'en',
            autoclear_cookies: true,
            page_scripts: true,

            // Paksa reset status cookie setiap kali halaman dimuat ulang (berguna untuk testing agar banner pasti muncul)
            // Hapus atau comment baris di bawah nanti jika sudah production
            // revision: 1, 

            languages: {
                en: {
                    consentModal: {
                        title: 'Kami Menghargai Privasi Anda',
                        description: 'Kami menggunakan cookie untuk meningkatkan pengalaman menjelajah Anda, menyajikan konten yang dipersonalisasi, dan menganalisis lalu lintas web kami. Dengan mengklik "Terima Semua", Anda menyetujui penggunaan cookie.',
                        acceptAllBtn: 'Terima Semua',
                        acceptNecessaryBtn: 'Tolak',
                        showPreferencesBtn: 'Atur Preferensi'
                    },
                    preferencesModal: {
                        title: 'Pengaturan Preferensi Cookie',
                        acceptAllBtn: 'Terima Semua',
                        acceptNecessaryBtn: 'Tolak Semua',
                        savePreferencesBtn: 'Simpan Preferensi',
                        closeIconLabel: 'Tutup',
                        sections: [
                            {
                                title: 'Cookie yang Diperlukan (Wajib)',
                                description: 'Cookie ini esensial agar website dapat berfungsi dengan baik.',
                                linkedCategory: 'necessary'
                            },
                            {
                                title: 'Cookie Analitik & Kinerja',
                                description: 'Digunakan untuk memahami bagaimana pengunjung berinteraksi dengan situs web.',
                                linkedCategory: 'analytics'
                            }
                        ]
                    }
                }
            }
        });
    }
});