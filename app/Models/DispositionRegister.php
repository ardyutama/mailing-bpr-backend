<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_register', 'creator_id', 'nota_id',
    ];
    public function dispositionMails()
    {
        return $this->hasMany(DispositionMail::class,'register_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'creator_id');
    }
    public function nota()
    {
        return $this->belongsTo(Nota::class,'nota_id');
    }
}
