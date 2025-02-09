<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'event_date'];

    public function invitations() {
        return $this->hasMany(Invitation::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'invitations')
                    ->withPivot('status', 'attended')
                    ->withTimestamps();
    }
}
