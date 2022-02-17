<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposisi_inbox_mail extends Model
{
    use HasFactory;

    public function InboxMails(){
        return $this->belongsTo(InboxMail::class);
    }
}
