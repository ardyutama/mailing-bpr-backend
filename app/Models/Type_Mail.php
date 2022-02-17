<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Mail extends Model
{
    use HasFactory;

    public function InboxMails()
    {
        return $this->hasMany(InboxMail::class);
    }
    public function OutwardMails()
    {
        return $this->hasMany(OutwardMail::class);
    }
}
