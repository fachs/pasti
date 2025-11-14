<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rab extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'rincian',
        'bidang',
        'proker_id',
        'harga',
        'kuantitas',
        'total',
    ];

    public function bidang() : BelongsTo {
        return $this->belongsTo(Bidang::class);
    }

    public function programKerja() : BelongsTo {
        return $this->belongsTo(ProgramKerja::class);
    }
}
