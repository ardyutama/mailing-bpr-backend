<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_isi','pengirim_id', 'penerima_id','isi_disposisi','inbox_id'
    ];
    public function InboxMails()
    {
        return $this->belongsTo(InboxMail::class);
    }
    public function Employees()
    {
        return $this->belongsTo(Employee::class);
    }
}
