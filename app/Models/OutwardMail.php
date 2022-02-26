<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_surat_keluar', 'perihal', 'tipe_surat_id', 'sifat_surat', 'pengirim_surat', 'penerima_surat','approver', 'creator_id',
    ];
    public function typeMails(){
        return $this->belongsTo(TypeMail::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}
