<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Authenticatable implements JWTSubject
{

    protected $fillable = [
        'first_name','last_name','NIP','departement_id','role_id'
    ];
    protected $hidden = [
        'password',
    ];
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    use HasFactory;

    public function roles(){
        return $this->belongsTo(Role::class);
    }
    public function departements()
    {
        return $this->belongsTo(Departement::class);
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
    
}
