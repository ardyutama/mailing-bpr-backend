<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxMail extends Model
{
    use HasFactory;

    public function disposisi_inbox_mails(){
        return $this->hasMany(disposisi_inbox_mail::class);
    }
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
    public function type_mails(){
        return $this->belongsTo(Type_Mail::class);
    }

}
