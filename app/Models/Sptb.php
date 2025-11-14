<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sptb extends Model
{
    use HasFactory;

    protected $fillable = [
        'himpunan',
        'nominal_iuk',
        'jumlah_mhs',
        'pic',
        'pic_nim',
        'pic_wa',
        'lampiran_sptb',
        'lampiran_nList',
    ];
}
