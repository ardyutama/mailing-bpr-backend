<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'NIP','employee_id','password'
    ];
    protected $hidden = [
        'password',
    ];
    
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
    public function Employees()
    {
        return $this->belongsTo(Employee::class);
    }
}
