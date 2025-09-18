@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kategori Surat >> Tambah</h3>
    <p>Tambahkan atau edit data kategori.</p>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $nextId }}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection