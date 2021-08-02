<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'activestudent_id',
        'name',
        'year',
    ];

    public function activestudent(){
        return $this->belongsTo(Activestudent::class);
    }
}
