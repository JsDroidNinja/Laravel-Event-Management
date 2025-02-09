<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function invitations() {
        return $this->hasMany(Invitation::class);
    }
    
    public function events()
    {
        return $this->belongsToMany(Event::class, 'invitations')
                    ->withPivot('status', 'attended');
    }

}
