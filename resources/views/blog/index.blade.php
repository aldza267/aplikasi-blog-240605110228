@extends('blog.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-8">
        @forelse($artikel as $a)
        <div class="card-artikel card">
            @if($a->gambar)
            <img src="{{ asset('storage/gambar/' . $a->gambar) }}" class="artikel-img" alt="{{ $a->judul }}">
            @endif
            <div class="card-body">
                <span class="badge-kategori">{{ $a->kategori->nama_kategori }}</span>
                <h5 class="fw-bold">{{ $a->judul }}</h5>
                <div class="d-flex align-items-center mb-2">
                    <span class="avatar-sm">{{ strtoupper(substr($a->penulis->nama_depan, 0, 1)) }}</span>
                    <small class="text-muted">{{ $a->penulis->nama_depan }} {{ $a->penulis->nama_belakang }} &nbsp;•&nbsp; {{ $a->hari_tanggal }}</small>
                </div>
                <p class="text-muted" style="font-size:0.9rem;">{{ Str::limit(strip_tags($a->isi), 180) }}</p>
                <a href="{{ route('blog.show', $a->id) }}" class="btn btn-baca">Baca Selengkapnya →</a>
            </div>
        </div>
        @empty
        <p class="text-muted">Tidak ada artikel.</p>
        @endforelse
    </div>
    <div class="col-lg-4">
        <div class="sidebar-box">
            <h6>Kategori Artikel</h6>
            <a href="{{ route('blog.index') }}" class="kategori-item {{ is_null($aktifKategori) ? 'active' : '' }}">
                Semua Artikel <span class="badge rounded-pill">{{ $totalArtikel }}</span>
            </a>
            @foreach($kategoris as $k)
            <a href="{{ route('blog.kategori', $k->id) }}" class="kategori-item {{ $aktifKategori == $k->id ? 'active' : '' }}">
                {{ $k->nama_kategori }} <span class="badge rounded-pill">{{ $k->artikel_count }}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection