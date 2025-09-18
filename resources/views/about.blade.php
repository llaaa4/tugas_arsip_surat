@extends('layouts.app')
@section('content')
<div class="container">
    <h3>About</h3>
    <hr>
    <div class="row align-items-center">
        <div class="col-md-3 text-center">
            <img src="{{ asset('images/DELLA.jpg') }}" alt="Foto Profil Anda" 
                class="img-fluid" style="max-width: 150px;">
        </div>

        <div class="col-md-9">
            <p>Aplikasi ini dibuat oleh:</p>
            <table class="table table-borderless">
                <tr>
                    <td style="width: 100px;"><strong>Nama</strong></td>
                    <td>: Della Marsela</td>
                </tr>
                <tr>
                    <td><strong>Prodi</strong></td>
                    <td>: D3-MI PSDKU Kediri</td>
                </tr>
                <tr>
                    <td><strong>NIM</strong></td>
                    <td>: 2331730020</td>
                </tr>
                <tr>
                   <td><strong>Tanggal</strong></td>
                    <td>: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection