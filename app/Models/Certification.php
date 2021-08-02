<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'inactivestudent_id',
        'name',
        'year',
    ];

    public function inactivestudent(){
        return $this->belongsTo(Inactivestudent::class);
    }
}
