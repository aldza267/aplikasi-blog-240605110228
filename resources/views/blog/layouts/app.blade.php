<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar { background-color: #1e2327 !important; }
        .navbar-brand, .nav-link { color: #fff !important; }
        .navbar-brand small { display:block; font-size:0.72rem; color:#adb5bd; font-weight:400; }
        .nav-link:hover { color:#adb5bd !important; }
        footer { background-color: #1e2327; color: #adb5bd; padding: 20px 0; margin-top: 50px; }
        .card-artikel { border:none; box-shadow:0 1px 4px rgba(0,0,0,0.08); border-radius:8px; margin-bottom:28px; }
        .badge-kategori { background:#28a745; color:#fff; font-size:0.75rem; padding:4px 12px; border-radius:12px; display:inline-block; margin-bottom:8px; }
        .btn-baca { background:#28a745; color:#fff; border:none; border-radius:20px; padding:6px 18px; font-size:0.85rem; }
        .btn-baca:hover { background:#218838; color:#fff; }
        .sidebar-box { background:#fff; border-radius:8px; padding:20px; box-shadow:0 1px 4px rgba(0,0,0,0.08); }
        .sidebar-box h6 { font-weight:700; margin-bottom:14px; }
        .kategori-item { display:flex; justify-content:space-between; align-items:center; padding:8px 12px; border-radius:6px; margin-bottom:4px; text-decoration:none; color:#333; font-size:0.9rem; }
        .kategori-item:hover, .kategori-item.active { background:#28a745; color:#fff; }
        .kategori-item:hover .badge, .kategori-item.active .badge { background:#fff !important; color:#28a745 !important; }
        .kategori-item .badge { background:#e9ecef; color:#555; font-size:0.75rem; }
        .avatar-sm { width:28px; height:28px; border-radius:50%; background:#28a745; color:#fff; display:inline-flex; align-items:center; justify-content:center; font-size:0.72rem; font-weight:700; margin-right:6px; }
        .artikel-img { width:100%; height:220px; object-fit:cover; border-radius:8px 8px 0 0; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog.index') }}">
            <strong>Blog Kami</strong>
            <small>Artikel terbaru seputar teknologi dan pemrograman</small>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<footer class="text-center">
    <p class="mb-0">© 2026 Blog Kami. Seluruh hak cipta dilindungi.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>