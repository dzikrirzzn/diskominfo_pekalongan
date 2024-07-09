<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Berita') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <h3>Berita Kota</h3>
                        @foreach ($allBerita as $berita)
                        @if ($berita instanceof \App\Models\HeadlineBerita)
                        <div class="mb-4">
                            <h4>{{ $berita->title }}</h4>
                            <p>{{ $berita->subtitle }}</p>
                            <p>{{ $berita->author }} - {{ $berita->date }}</p>
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
                            <p>{{ $berita->content }}</p>
                        </div>
                        @endif
                        @endforeach

                        <h3>Berita Lainnya</h3>
                        @foreach ($allBerita as $berita)
                        @if ($berita instanceof \App\Models\OtherBerita)
                        <div class="mb-4">
                            <h4>{{ $berita->title }}</h4>
                            <p>{{ $berita->subtitle }}</p>
                            <p>{{ $berita->author }} - {{ $berita->date }}</p>
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
                            <p>{{ $berita->content }}</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>