<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'NIP','employee_id','password'
    ];
    protected $hidden = [
        'password',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function inboxMails()
    {
        return $this->hasMany(InboxMail::class);
    }
    public function outwardMails()
    {
        return $this->hasMany(OutwardMail::class);
    }
    public function dispositionMails()
    {
        return $this->hasMany(DispositionMail::class);
    }
    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

}


