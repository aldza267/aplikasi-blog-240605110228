@extends('layouts.app')
@section('title', 'Edit Artikel')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">Edit Artikel</h6>
    <a href="{{ route('artikel.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Kembali</a>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Judul <span class="text-danger">*</span></label>
            <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" class="form-control @error('judul') is-invalid @enderror">
            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Kategori <span class="text-danger">*</span></label>
            <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $item)
                <option value="{{ $item->id }}" {{ old('id_kategori', $artikel->id_kategori) == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
            @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Isi Artikel <span class="text-danger">*</span></label>
            <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $artikel->isi) }}</textarea>
            @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size:13px;">Gambar</label>
            <div class="mb-2"><img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" style="width:80px;height:60px;object-fit:cover;border-radius:6px;border:1px solid #e9ecef;"></div>
            <input type="file" name="gambar" accept="image/jpg,image/jpeg,image/png" class="form-control @error('gambar') is-invalid @enderror">
            <div class="form-text" style="font-size:12px;">Kosongkan jika tidak ingin mengubah gambar.</div>
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('artikel.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Batal</a>
            <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
        </div>
    </form>
</div></div>
@endsection