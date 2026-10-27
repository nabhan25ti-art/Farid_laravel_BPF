<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'Biodata_1066';

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'no_hp',
        'alamat',
        'pendidikan',
        'deskripsi',
        'foto',
        'pengalaman',
        'tujuan_karier'
    ];
}