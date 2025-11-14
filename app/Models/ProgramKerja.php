<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramKerja extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'nama_bidang',
        'progress',
        'tanggal_pelaksanaan',
        'pic_1',
    ];

    public function bidang() : BelongsTo {
        return $this->belongsTo(Bidang::class);
    }
}
