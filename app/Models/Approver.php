<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'isApproved','approved_time','nota_id'];
    public function notas()
    {
        return $this->belongsTo(Nota::class,'nota_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
