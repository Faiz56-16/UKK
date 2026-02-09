<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelaporan';
    protected $table = 'aspirasi';
    protected $fillable = [
        'nis',
        'keterangan',
        'lokasi',
        'id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
     public function umpanbalik()
    {
        return $this->hasOne(umpanbalik::class, 'id_pelaporan', 'id_pelaporan');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
