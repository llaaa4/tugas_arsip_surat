@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kategori Surat >> Edit</h3>
    <p>Edit data kategori.</p>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $kategori->keterangan }}</textarea>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection