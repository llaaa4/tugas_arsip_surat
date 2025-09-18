@extends('layouts.app') 

@section('content') 
<div class="container">
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Arsip Surat</h3>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
    Klik "Liah" pada kolom aksi untuk menampilkan surat.</p>

    <form action="{{ route('surat.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari surat berdasarkan judul..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <a href="{{ route('surat.create') }}" class="btn btn-success mb-3">Arsipkan Surat..</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($surat as $item)
            <tr>
                <td>{{ $item->nomor_surat }}</td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="form-hapus d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    <a href="{{ asset($item->file_path) }}" class="btn btn-warning btn-sm" download>Unduh</a>
                    <a href="{{ route('surat.show', $item->id) }}" class="btn btn-primary btn-sm">Lihat >></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data surat yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $surat->links() }}
</div>
@endsection 

@section('scripts') 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.form-hapus').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menghapus arsip surat ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection