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
        'first_name','last_name','division_id','role_id','NIP','password'
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
    public function nota()
    {
        return $this->hasMany(Nota::class);
    }
    public function dispositionMails()
    {
        return $this->hasMany(DispositionMail::class);
    }
    public function dispositionRegisters()
    {
        return $this->hasMany(DispositionRegister::class);
    }
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class);
    }
}


