<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardMail extends Model
{
    use HasFactory;

    public function Type_Mails(){
        return $this->belongsTo(Type_Mail::class);
    }

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
    
}
