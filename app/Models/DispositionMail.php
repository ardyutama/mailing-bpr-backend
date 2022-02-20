<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_isi','kepada','isi_disposisi','dari','inbox_id'
    ];
    public function InboxMails()
    {
        return $this->belongsTo(InboxMail::class);
    }
}
