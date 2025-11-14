<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Superuser extends Model
{
    public function bidang() : HasMany {
        return $this->hasMany(Bidang::class);
    }

    public function user() : HasMany {
        return $this->hasMany(User::class);
    }
}
