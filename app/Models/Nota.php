<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_nota', 'no_nota', 'perihal', 'approver_id', 'isApproved', 'departement_id', 'receiver_id', 'creator_id', 'openedAt', 'lastOpened_id'
    ];
    public function dispositionRegisters()
    {
        return $this->hasOne(DispositionRegister::class, 'nota_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
