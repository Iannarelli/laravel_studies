<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliUser extends Model
{
    use HasFactory;

    public function polimorfismos() {
        return $this->morphMany('App\Models\Polimorfismo', 'poliable');
    }
}
