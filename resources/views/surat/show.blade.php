@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Arsip Surat >> Lihat</h3>
    <hr>
    <p><strong>Nomor:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}</p>
    <p><strong>Judul:</strong> {{ $surat->judul }}</p>
    <p><strong>Waktu Unggah:</strong> {{ $surat->created_at->format('Y-m-d H:i:s') }}</p>

    <iframe src="{{ asset($surat->file_path) }}" width="100%" height="500px"></iframe>


    <div class="mt-3">
        <a href="{{ route('surat.index') }}" class="btn btn-secondary"><< Kembali</a>
        <a href="{{ asset($surat->file_path) }}" class="btn btn-warning" download>Unduh</a>
        <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary">Edit/Ganti File</a>
    </div>
</div>
@endsection