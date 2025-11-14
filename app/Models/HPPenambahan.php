<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HPPenambahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'koreksi_saldo',
        'belanja',
        'hibah',
        'mutasi',
        'reklasifikasi',
        'lainnya',
        'total_penambahan',
    ];

    public function harga_perolehans() : HasOne {
        return $this->hasOne(HargaPerolehan::class,'hp_penambahan_id');
    }
}
