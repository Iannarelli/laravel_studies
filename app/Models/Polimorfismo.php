<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polimorfismo extends Model
{
    use HasFactory;

    public function poliable() {
        return $this->morphTo();
    }
}
