<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nama',
        'password',
        'kelas',
    ];
}
