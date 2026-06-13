<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    public $timestamps = false;
   protected $fillable = ['nama_lengkap', 'email', 'password', 'foto'];
    protected $hidden = ['password'];

    public function artikel() {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }
}