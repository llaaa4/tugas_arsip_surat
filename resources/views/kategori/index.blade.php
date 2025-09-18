@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kategori Surat</h3>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">[+] Tambah Kategori Baru</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="form-hapus">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
