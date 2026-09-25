<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Berita') }}
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

                <form action="{{ route('news.update', $news->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-medium mb-1">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $news->title) }}" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Kategori</label>
                        <input type="text" name="category" value="{{ old('category', $news->category) }}" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">URL Gambar</label>
                        <input type="url" name="image" value="{{ old('image', $news->image) }}" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Ringkasan Singkat (Excerpt)</label>
                        <textarea name="excerpt" rows="3" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('excerpt', $news->excerpt) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Isi Berita Lengkap</label>
                        <textarea name="content" rows="6" class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('content', $news->content) }}</textarea>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:underline text-sm font-medium">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors">
                            Perbarui Berita
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>