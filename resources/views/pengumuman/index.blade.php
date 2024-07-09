<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengumuman</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Pengumuman') }}
            </h2>
        </x-slot>

        <div class="container">
            <h1>Daftar Pengumuman</h1>
            @foreach($pengumuman as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h2>{{ $item->judul }}</h2>
                    <p>{{ $item->tanggal }}</p>
                    <p>{{ $item->penulis }}</p>
                    <p>{{ Str::limit($item->isi_pengumuman, 100) }}</p>
                    <a href="{{ route('pengumuman.show', $item->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </x-app-layout>
</body>

</html>