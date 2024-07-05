@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $pengumuman->judul }}</h1>
    <p>{{ $pengumuman->tanggal }}</p>
    <p>{{ $pengumuman->penulis }}</p>
    <div>
        {!! nl2br(e($pengumuman->isi_pengumuman)) !!}
    </div>
    @if($pengumuman->gambar_pengumuman)
        <img src="{{ asset('storage/' . $pengumuman->gambar_pengumuman) }}" alt="Gambar Pengumuman">
    @endif
    @if($pengumuman->link_pdf_pengumuman)
        <a href="{{ asset('storage/' . $pengumuman->link_pdf_pengumuman) }}" class="btn btn-primary">Download PDF</a>
    @endif
</div>
@endsection
