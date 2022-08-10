<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function test() {
        return $this->hasOne('App\Models\Test');
    }

    public function tests() {
        return $this->hasMany('App\Models\Test')->withTrashed();
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function address() {
        return $this->hasOne('App\Models\Address');
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }
}
