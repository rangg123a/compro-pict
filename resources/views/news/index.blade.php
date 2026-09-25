@extends('layouts.app')

@section('content')
<section class="py-12 px-4 max-w-7xl mx-auto">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Berita & Informasi Terbaru</h1>
        <p class="text-gray-600">Ikuti perkembangan terbaru seputar operasional dan kegiatan perusahaan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($newsList as $item)
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400 text-sm">Tidak ada gambar</div>
                    @endif

                    <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                        {{ $item->category }}
                    </span>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="text-sm text-gray-500 mb-2">
                        {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}
                    </div>

                    <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 transition-colors">
                        <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                    </h2>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                        {{ $item->excerpt }}
                    </p>
                    
                    <div class="pt-4 border-t border-gray-100 mt-auto">
                        <a href="{{ route('news.show', $item->slug) }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                            Baca Selengkapnya 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-3 text-center py-16 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <h3 class="text-lg font-medium text-gray-700">Belum ada berita</h3>
                <p class="text-sm text-gray-500 mt-1">Berita terbaru akan segera ditampilkan di sini.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection