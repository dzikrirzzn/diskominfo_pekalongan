@extends('layouts.app')

@section('content')
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
@endsection
