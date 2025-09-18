@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Arsip Surat >> Edit</h3>
    <p>Edit data arsip surat. Kosongkan isian file jika tidak ingin mengubahnya.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id" required>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ $surat->kategori_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $surat->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="file_pdf" class="form-label">File Surat (PDF)</label>
            <br>
            <a href="{{ asset($surat->file_path) }}" target="_blank">Lihat file saat ini</a>
            <input class="form-control mt-2" type="file" id="file_pdf" name="file_pdf">
        </div>
        
        <a href="{{ route('surat.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection