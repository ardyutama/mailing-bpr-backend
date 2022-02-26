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
    public function inboxMails()
    {
        return $this->hasMany(InboxMail::class);
    }
    public function outwardMails()
    {
        return $this->hasMany(OutwardMail::class);
    }
}
