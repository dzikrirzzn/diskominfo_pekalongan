<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - Pemerintah Kota Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-white">
    @include('layouts.navbarhome')
    <!-- Halaman Konten -->
    <!-- Banner -->
    <div class="relative h-48 sm:h-72 md:h-72 lg:h-48 bg-cover"
        style="background-image: url('{{ asset('img/batik.png') }}');">
        <div class="absolute inset-0 bg-gray-500 opacity-20"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 -mt-5 relative z-10 mb-10">
        <div class="flex flex-wrap md:flex-nowrap">
            <!-- Main Content -->
            <div class="bg-white p-6 rounded-lg shadow-lg md:mb-0 w-full md:w-8/12 md:mr-4"
                style="min-height: 500px; margin-top: -5rem;">
                <div class="mx-2">
                    @if($type === 'berita')
                    <h1 class="text-4xl font-bold mb-2">{{ $content->title }}</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $content->author }}</span> | <span>{{ $content->formatted_date }}</span> |
                        <span>2449 views</span>
                    </div>
                    <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center"
                        src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}">
                    <p class="leading-7 mb-4 text-justify">{{ $content->subtitle }}</p>
                    <p class="leading-7 mb-4 text-justify">{!! $content->content !!}</p>
                    @elseif($type === 'otherBerita')
                    <h1 class="text-4xl font-bold mb-2">{{ $content->title }}</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $content->author }}</span> | <span>{{ $content->formatted_date }}</span> |
                        <span>2449 views</span>
                    </div>
                    <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center"
                        src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}">
                    <p class="leading-7 mb-4 text-justify">{{ $content->subtitle }}</p>
                    <p class="leading-7 mb-4 text-justify">{!! $content->content !!}</p>
                    @elseif($type === 'galeri')
                    <h1 class="text-4xl font-bold mb-2">{{ $content->title }}</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $content->author }}</span> | <span>{{ $content->formatted_date }}</span> |
                        <span>2449 views</span>
                    </div>
                    <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center"
                        src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}">
                    <p class="leading-7 mb-4 text-justify">{{ $content->subtitle }}</p>
                    <p class="leading-7 mb-4 text-justify">{!! $content->content !!}</p>
                    @elseif($type === 'pengumuman')
                    <h1 class="text-4xl font-bold mb-2">{{ $content->judul }}</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $content->penulis }}</span> | <span>{{ $content->formatted_date }}</span>
                    </div>
                    <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center"
                        src="{{ asset('storage/' . $content->gambar_pengumuman) }}" alt="{{ $content->judul }}">
                    <p class="leading-7 mb-4 text-justify">{!! $content->isi_pengumuman !!}</p>
                    @elseif($type === 'travel')
                    <h1 class="text-4xl font-bold mb-2">{{ $content->judul }}</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $content->author }}</span> | <span>{{ $content->formatted_date }}</span>
                    </div>
                    <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center"
                        src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}">
                    <p class="leading-7 mb-4 text-justify">{{ $content->sub_judul }}</p>
                    <p class="leading-7 mb-4 text-justify">{!! $content->isi !!}</p>
                    <div class="mt-4">
                        <a href="{{ $content->map }}" target="_blank"
                            class="text-blue-500 hover:text-blue-700 underline">Lihat Lokasi di Peta</a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full md:w-4/12 bg-white p-6 rounded-lg shadow-lg -mt-20"
                style="max-height: 500px; overflow-y: auto;">
                <h2 class="text-2xl font-bold mb-6 border-gray-400 border-b-2 mr-1">Lainnya</h2>
                <ul class="space-y-4">
                    @foreach ($otherContent as $item)
                    <li class="flex items-center">
                        <a href="{{ route('content.show', ['type' => 'otherBerita', 'id' => $item->id]) }}"
                            class="flex justify-between w-full no-underline">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4"
                                src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">{{ $item->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ $item->formatted_date }}</p>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>