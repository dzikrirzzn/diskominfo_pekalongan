<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    @include('layouts.navbarhome')

    <div class="container mx-auto p-6 pt-20">
        <div class="text-center mb-12">
            @if($type == 'berita')
            <h1 class="text-4xl font-bold mb-4">Berita Kota Pekalongan</h1>
            <p class="text-lg text-gray-600">Update terkini dari Kota Pekalongan. Cerita, foto, video,
                dan podcast tentang area lokal kami.</p>
            @elseif($type == 'otherBerita')
            <h1 class="text-4xl font-bold mb-4">Berita Kota Pekalongan</h1>
            <p class="text-lg text-gray-600">Update terkini dari Kota Pekalongan. Cerita, foto, video,
                dan podcast tentang area lokal kami.</p>
            @elseif($type == 'pengumuman')
            <h1 class="text-4xl font-bold mb-4">Pengumuman Kota Pekalongan</h1>
            <p class="text-lg text-gray-600">Pengumuman resmi dari Pemerintah Kota Pekalongan.</p>
            @elseif($type == 'travel')
            <h1 class="text-4xl font-bold mb-4">Rekomendasi Wisata Kota Pekalongan</h1>
            <p class="text-lg text-gray-600">Tempat-tempat wisata menarik di Kota Pekalongan.</p>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($data as $item)
            <a href="{{ route('content.show', ['type' => $type, 'id' => $item->id]) }}"
                class="block no-underline text-black">
                @if ($type == 'berita')
                <div class="flex bg-white p-6 rounded-lg shadow-md">
                    <img class="w-24 h-24 object-cover" src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->title }}">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->subtitle }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->formatted_date }}</p>
                    </div>
                </div>
                @elseif ($type == 'otherBerita')
                <div class="flex bg-white p-6 rounded-lg shadow-md">
                    <img class="w-24 h-24 object-cover" src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->title }}">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->subtitle }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->formatted_date }}</p>
                    </div>
                </div>
                @elseif ($type == 'galeri')
                <div class="flex bg-white p-6 rounded-lg shadow-md">
                    <img class="w-24 h-24 object-cover" src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->title }}">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->subtitle }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->formatted_date }}</p>
                    </div>
                </div>
                @elseif ($type == 'pengumuman')
                <div class="flex bg-white p-6 rounded-lg shadow-md">
                    <img class="w-24 h-24 object-cover" src="{{ asset('storage/' . $item->gambar_pengumuman) }}"
                        alt="{{ $item->judul }}">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mb-4">{!! $item->isi_pengumuman !!}</p>
                        <p class="text-gray-500 text-sm">{{ $item->formatted_date }}</p>
                    </div>
                </div>
                @elseif ($type == 'travel')
                <div class="flex bg-white p-6 rounded-lg shadow-md">
                    <img class="w-24 h-24 object-cover" src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->judul }}">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->sub_judul }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->formatted_date }}</p>
                    </div>
                </div>
                @endif
            </a>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>