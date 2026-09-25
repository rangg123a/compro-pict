<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Berita Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium mb-1">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Kategori</label>
                        <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Operasional, Pemerintahan" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>

                    {{-- ========== BAGIAN UPLOAD & KAMERA TANPA ALPINE ========== --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Upload Gambar / Ambil Foto</label>
                        
                        {{-- Area Preview Gambar --}}
                        <div id="preview-container" class="mb-3 hidden">
                            <img id="image-preview" src="#" alt="Preview" class="w-full max-h-64 object-contain rounded-lg border border-gray-300 dark:border-gray-700">
                        </div>

                        <div class="flex flex-wrap gap-3">
                            {{-- Input file khusus kamera (langsung buka kamera belakang di HP) --}}
                            <input type="file" name="image" id="cameraInput" accept="image/*" capture="environment" class="hidden" onchange="previewImage(event)">

                            {{-- Input file khusus galeri (pilih dari penyimpanan) --}}
                            <input type="file" name="image_gallery" id="galleryInput" accept="image/*" class="hidden" onchange="previewImage(event)">

                            {{-- Tombol Pemicu Kamera --}}
                            <button type="button" onclick="document.getElementById('cameraInput').click()" 
                                class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Ambil Foto (Kamera)
                            </button>

                            {{-- Tombol Pemicu Galeri --}}
                            <button type="button" onclick="document.getElementById('galleryInput').click()" 
                                class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Pilih dari Galeri
                            </button>

                            {{-- Tombol Hapus --}}
                            <button type="button" id="removeBtn" onclick="clearImage()" 
                                class="hidden inline-flex items-center gap-2 px-4 py-2.5 bg-red-100 hover:bg-red-200 text-red-700 text-sm font-medium rounded-lg transition-colors">
                                Hapus
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Gunakan tombol kamera untuk menjepret langsung atau galeri untuk memilih file.</p>
                    </div>
                    {{-- ========== END BAGIAN UPLOAD ========== --}}

                    <div>
                        <label class="block text-sm font-medium mb-1">Ringkasan Singkat (Excerpt)</label>
                        <textarea name="excerpt" rows="3" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('excerpt') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Isi Berita Lengkap</label>
                        <textarea name="content" rows="6" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:underline text-sm font-medium">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors">
                            Simpan Berita
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- JavaScript Murni (Vanilla JS) untuk Preview & Reset --}}
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('preview-container').classList.remove('hidden');
                    document.getElementById('removeBtn').classList.remove('hidden');
                }
                reader.readAsDataURL(file);

                // Sinkronkan input file agar form mengirimkan name="image" yang benar
                if (event.target.id === 'cameraInput') {
                    document.getElementById('galleryInput').value = '';
                } else {
                    document.getElementById('cameraInput').value = '';
                }
            }
        }

        function clearImage() {
            document.getElementById('cameraInput').value = '';
            document.getElementById('galleryInput').value = '';
            document.getElementById('preview-container').classList.add('hidden');
            document.getElementById('removeBtn').classList.add('hidden');
        }
    </script>
</x-admin-layout>