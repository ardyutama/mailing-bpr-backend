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
    public function dispositionMails(){
        return $this->hasMany(DispositionMail::class,'inbox_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function typeMails(){
        return $this->belongsTo(TypeMail::class);
    }

}
