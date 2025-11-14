<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReqNoSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'file_surat',
        'hasil_no_surat',
        'pic_kontak',
        'bidang',
        'pic_name',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function bidang() : BelongsTo {
        return $this->belongsTo(Bidang::class);
    }
}
