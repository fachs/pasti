<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LapKeuanganIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'sumber',
        'jumlah',
        'tanggal',
        'bidang',
    ];

    public function bidang() : BelongsTo {
        return $this->belongsTo(Bidang::class);
    }
}
