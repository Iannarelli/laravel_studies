<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $directory = '/images/';
    protected $fillable = ['title', 'content', 'is_admin', 'user_id', 'path'];

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags() {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function scopeLasts($query) {
        return $query->orderBy('id', 'asc');
    }

    public function getPathAttribute($value) {
        return $this->directory.$value;
    }
}
