<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'activestudent_id',
        'name',
        'type',
        'income',
        'instagram',
        'line',
    ];

    public function activestudent(){
        return $this->belongsTo(Activestudent::class);
    }
}
