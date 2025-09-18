<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; height: 100vh; background-color: #f8f9fa; padding: 20px; }
        .content { flex-grow: 1; padding: 20px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('surat.index') }}">⭐ Arsip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">🗃️ Kategori Surat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">ℹ️ About</a>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>
</html>