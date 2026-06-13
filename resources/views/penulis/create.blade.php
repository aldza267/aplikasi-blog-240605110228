@extends('layouts.app')
@section('title', 'Tambah Penulis')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">Tambah Penulis</h6>
    <a href="{{ route('penulis.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Kembali</a>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
    <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama lengkap penulis">
            @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat email">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size:13px;">Foto Profil</label>
            <input type="file" name="foto" accept="image/jpg,image/jpeg,image/png" class="form-control @error('foto') is-invalid @enderror">
            <div class="form-text" style="font-size:12px;">JPG/PNG, maks 2MB. Jika tidak diisi, foto default digunakan.</div>
            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('penulis.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Batal</a>
            <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
        </div>
    </form>
</div></div>
@endsection