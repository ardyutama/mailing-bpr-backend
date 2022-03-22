<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_disposisi','register_id', 'creator_id','disposisiTo_id','comment'
    ];
    public function dispositionRegisters()
    {
        return $this->belongsTo(DispositionRegister::class,'register_id');
    }
    public function creators()
    {
        return $this->belongsTo(User::class,'creator_id');
    }
    public function dispositionTo()
    {
        return $this->belongsTo(User::class, 'disposisiTo_id');
    }
}
