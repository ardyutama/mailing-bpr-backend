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
    public function Type_Mails(){
        return $this->belongsTo(Type_Mail::class);
    }

    public function Employees()
    {
        return $this->belongsTo(Employee::class);
    }
    
}
