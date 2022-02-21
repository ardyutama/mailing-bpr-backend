<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Model
{

    protected $fillable = [
        'first_name','last_name','departement_id','role_id'
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
    
    public function users(){
        return $this->belongsTo(User::class);
    }
    
}
