<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'is_admin', 'user_id'];

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags() {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
