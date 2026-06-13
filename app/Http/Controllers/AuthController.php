<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

   public function login(Request $request)
    {
        $username = $request->input('user_name');
        $password = $request->input('password');

        // Cari penulis berdasarkan user_name di database
        $penulis = DB::table('penulis')->where('user_name', $username)->first();

        // Cek apakah penulis ada, dan cocokkan password BCrypt-nya secara manual
        if ($penulis && Hash::check($password, $penulis->password)) {
            
            // Format waktu login otomatis manual yang super aman & ringan
            date_default_timezone_set('Asia/Jakarta');
            $hari   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            $bulan  = [
                1=>'Januari', 2=>'Februari', 3=>'Maret',
                4=>'April',   5=>'Mei',      6=>'Juni',
                7=>'Juli',    8=>'Agustus',  9=>'September',
                10=>'Oktober',11=>'November',12=>'Desember'
            ];
            $sekarang     = new \DateTime();
            $nama_hari    = $hari[$sekarang->format('w')];
            $tanggal      = $sekarang->format('j');
            $nama_bulan   = $bulan[(int)$sekarang->format('n')];
            $tahun        = $sekarang->format('Y');
            $jam          = $sekarang->format('H:i');
            $waktu_sekarang = "$nama_hari, $tanggal $nama_bulan $tahun | $jam";

            session([
                'login_penulis' => true, 
                'id_penulis' => $penulis->id, 
                'nama_penulis' => $penulis->nama_depan,
                'waktu_login' => $waktu_sekarang
            ]);

            session()->flash('pesan', 'Login berhasil.');

            return redirect('/dashboard');
        }

        return redirect('/login')->with('error', 'Username atau Password salah!');
    }    public function logout()
    {
        session()->flush(); 
        return redirect('/');
    }
}