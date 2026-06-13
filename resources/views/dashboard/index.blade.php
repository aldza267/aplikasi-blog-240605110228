@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:calc(100vh - 160px);">
    <div class="card border-0 shadow-sm" style="max-width:480px;width:100%;border-radius:12px;">
        <div class="card-body p-5 text-center">
            <h5 class="fw-semibold mb-1">Selamat datang, <span style="color:#2e7d32;">{{ $nama_lengkap }}</span></h5>
            <p class="text-muted small mb-3">Silakan pilih menu di sebelah kiri untuk mulai mengelola konten blog.</p>
            <hr>
            <div class="row g-3 text-start">
                <div class="col-6">
                    <div class="p-3 rounded" style="background:#f8f9fa;">
                        <div class="text-uppercase fw-semibold mb-1" style="font-size:10px;color:#adb5bd;">Login sebagai</div>
                        <div style="font-size:12px;font-weight:500;">{{ $nama_lengkap }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 rounded" style="background:#f8f9fa;">
                        <div class="text-uppercase fw-semibold mb-1" style="font-size:10px;color:#adb5bd;">Waktu login</div>
                        <div style="font-size:12px;font-weight:500;">{{ $waktu_login }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection