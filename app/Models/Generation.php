<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
    ];

    public function activestudents(){
        return $this->hasMany(Activestudent::class);
    }

    public function inactivestudents(){
        return $this->hasMany(Inactivestudent::class);
    }

    public function studentrequests(){
        return $this->hasMany(Studentrequest::class);
    }

    public function alumnirequests(){
        return $this->hasMany(Alumnirequest::class);
    }
}
