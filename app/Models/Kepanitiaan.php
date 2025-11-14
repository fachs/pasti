<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kepanitiaan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'proker_id',
        'nama_proker',
        'bidang',
        'divisi',
        'pelaksanaan',
        'jobdesc',
    ];
    
    public function programKerja() : BelongsTo {
        return $this->belongsTo(ProgramKerja::class);
    }
}
