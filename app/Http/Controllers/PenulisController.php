<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function index() {
        // Diubah menjadi nama_lengkap sesuai dengan database
        $penulis = Penulis::orderBy('nama_lengkap', 'asc')->get();
        return view('penulis.index', compact('penulis'));
    }

    public function create() { 
        return view('penulis.create'); 
    }

    public function store(Request $request) {
        // Validasi disesuaikan dengan kolom database asli (nama_lengkap & email)
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:penulis,email',
            'password'     => 'required|string|min:8',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFoto = 'default.png';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('foto', $namaFoto, 'public');
        }

        // Simpan data menggunakan kolom database asli
        Penulis::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'foto'         => $namaFoto,
        ]);

        return redirect()->route('penulis.index')->with('sukses', 'Penulis berhasil ditambahkan.');
    }

    public function edit(string $id) {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, string $id) {
        $penulis = Penulis::findOrFail($id);
        
        // Validasi update disesuaikan
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:penulis,email,' . $id,
            'password'     => 'nullable|string|min:8',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap, 
            'email'        => $request->email
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($penulis->foto !== 'default.png') {
                Storage::disk('public')->delete('foto/' . $penulis->foto);
            }
            $file = $request->file('foto');
            $namaFoto = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('foto', $namaFoto, 'public');
            $data['foto'] = $namaFoto;
        }

        $penulis->update($data);
        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil diperbarui.');
    }

    public function destroy(string $id) {
        $penulis = Penulis::findOrFail($id);
        try {
            $foto = $penulis->foto;
            $penulis->delete();
            if ($foto !== 'default.png') {
                Storage::disk('public')->delete('foto/' . $foto);
            }
            return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('penulis.index')->with('gagal', 'Penulis tidak dapat dihapus karena masih memiliki artikel.');
        }
    }
}