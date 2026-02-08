<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umpanbalik extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_umpan_aspirasi';
    protected $table = 'umpan_balik_aspirasi';
    protected $fillable = [
        'id_pelaporan',
        'status',
        'feedback',
        'komentar'
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }
}
