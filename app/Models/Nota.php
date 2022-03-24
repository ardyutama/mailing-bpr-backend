<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_nota', 
        'no_nota', 
        'perihal', 
        'receiver_id', 
        'creator_id', 
        'openedAt',
        'lastOpened_id'
    ];
    public function dispositionRegisters()
    {
        return $this->hasOne(DispositionRegister::class, 'nota_id');
    }
    public function usersReceiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function usersCreator()
    {
        return $this->belongsTo(User::class, 'creator_id','id');
    }
    public function approverNota()
    {
        return $this->hasMany(Approver::class,'nota_id','id');
    }
}
