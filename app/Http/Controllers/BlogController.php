<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class BlogController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')
            ->orderByDesc('id')->limit(5)->get();
        $kategoris = KategoriArtikel::withCount('artikel')->get();
        $totalArtikel = Artikel::count();
        $aktifKategori = null;
        return view('blog.index', compact('artikel', 'kategoris', 'totalArtikel', 'aktifKategori'));
    }

    public function byKategori($id)
    {
        $artikel = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $id)
            ->orderByDesc('id')->limit(5)->get();
        $kategoris = KategoriArtikel::withCount('artikel')->get();
        $totalArtikel = Artikel::count();
        $aktifKategori = (int) $id;
        return view('blog.index', compact('artikel', 'kategoris', 'totalArtikel', 'aktifKategori'));
    }

    public function show($id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);
        $artikelTerkait = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $id)
            ->orderByDesc('id')->limit(5)->get();
        return view('blog.show', compact('artikel', 'artikelTerkait'));
    }
}