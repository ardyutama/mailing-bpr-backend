<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'first_name','last_name','NIP','departement_id','role_id'
    ];
    use HasFactory;

    public function roles(){
        return $this->belongsTo(Role::class);
    }
    public function departements()
    {
        return $this->belongsTo(Departement::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}
