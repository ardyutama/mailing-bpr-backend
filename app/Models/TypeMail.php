<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name'
    ];
    public function InboxMails()
    {
        return $this->hasMany(InboxMail::class);
    }
    public function OutwardMails()
    {
        return $this->hasMany(OutwardMail::class);
    }
}
