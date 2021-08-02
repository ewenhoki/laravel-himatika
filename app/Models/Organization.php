<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'activestudent_id',
        'name',
        'position',
        'period',
    ];

    public function activestudent(){
        return $this->belongsTo(Activestudent::class);
    }
}
