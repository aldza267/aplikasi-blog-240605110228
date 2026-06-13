@extends('blog.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" style="color:#28a745;">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.kategori', $artikel->id_kategori) }}" style="color:#28a745;">{{ $artikel->kategori->nama_kategori }}</a></li>
                <li class="breadcrumb-item active text-muted">{{ Str::limit($artikel->judul, 40) }}</li>
            </ol>
        </nav>
        @if($artikel->gambar)
        <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" class="w-100 mb-3" style="height:300px;object-fit:cover;border-radius:8px;" alt="{{ $artikel->judul }}">
        @endif
        <span class="badge-kategori">{{ $artikel->kategori->nama_kategori }}</span>
        <h4 class="fw-bold mt-2">{{ $artikel->judul }}</h4>
        <div class="d-flex align-items-center mb-3">
            <span class="avatar-sm">{{ strtoupper(substr($artikel->penulis->nama_depan, 0, 1)) }}</span>
            <div>
                <small class="fw-semibold">{{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}</small><br>
                <small class="text-muted">{{ $artikel->hari_tanggal }}</small>
            </div>
        </div>
        <div style="line-height:1.8;color:#333;">{!! nl2br(e($artikel->isi)) !!}</div>
        <div class="mt-4">
            <a href="{{ route('blog.index') }}" class="btn btn-baca">← Kembali ke Beranda</a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="sidebar-box">
            <h6>Artikel Terkait</h6>
            @forelse($artikelTerkait as $t)
            <a href="{{ route('blog.show', $t->id) }}" class="text-decoration-none text-dark">
                <div class="d-flex gap-2 mb-3">
                    @if($t->gambar)
                    <img src="{{ asset('storage/gambar/' . $t->gambar) }}" style="width:70px;height:55px;object-fit:cover;border-radius:6px;flex-shrink:0;">
                    @endif
                    <div>
                        <div style="font-size:0.85rem;font-weight:600;">{{ $t->judul }}</div>
                        <small class="text-muted">{{ $t->hari_tanggal }}</small>
                    </div>
                </div>
            </a>
            @empty
            <p class="text-muted" style="font-size:0.85rem;">Tidak ada artikel terkait.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection