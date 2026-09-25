<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard - Kelola Berita') }}
            </h2>
            <a href="{{ route('news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors shadow">
                + Tambah Berita Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Daftar Berita Terpublikasi</h3>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 text-sm">
                                    <th class="py-3 px-4">Judul</th>
                                    <th class="py-3 px-4">Kategori</th>
                                    <th class="py-3 px-4">Tanggal</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                                @php
                                    $allNews = \App\Models\News::latest()->get();
                                @endphp

                                @forelse($allNews as $item)
                                    <tr>
                                        <td class="py-3 px-4 font-medium max-w-xs truncate">{{ $item->title }}</td>
                                        <td class="py-3 px-4">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                {{ $item->category }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-gray-500 text-xs">
                                            {{ $item->created_at->format('d M Y') }}
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="flex items-center justify-center space-x-3">
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('news.edit', $item->id) }}" class="text-yellow-600 dark:text-yellow-400 hover:underline font-medium">Edit</a>
                                                
                                                {{-- Tombol Hapus --}}
                                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:underline font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-6 text-center text-gray-500">
                                            Belum ada berita yang diunggah. Silakan klik tombol "+ Tambah Berita Baru" di atas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>