<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

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

    public function type() {
       return $this->belongsTo('App\Models\UserType', 'type', 'id');
    }
    
    public function details() {
        return $this->hasOne('App\Models\UserDetails', 'user_id', 'id');
    }

    public function likes() {
        return $this->hasOne('App\Models\Fun', 'user_id', 'id');
    }

    public function givenBy() {
        return $this->hasOne('App\Models\Fun', 'user_id', 'id')->where('given_by', Auth::user()->id);
    }
}
