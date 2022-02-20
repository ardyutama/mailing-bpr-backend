<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_surat_masuk','perihal','tipe_surat_id','sifat_surat','pengirim_surat','penerima_surat','creator_id'
    ];
    public function disposisi_inbox_mails(){
        return $this->hasMany(Disposisi_inbox_mail::class);
    }
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
    public function type_mails(){
        return $this->belongsTo(Type_Mail::class);
    }

}
