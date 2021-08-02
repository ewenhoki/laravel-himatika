<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activestudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'generation_id',
        'boarding_address',
        'line',
        'interest',
        'father_name',
        'father_job',
        'father_phone',
        'mother_name',
        'mother_job',
        'mother_phone',
        'income',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }

    public function organizations(){
        return $this->hasMany(Organization::class);
    }

    public function committees(){
        return $this->hasMany(Committee::class);
    }

    public function seminars(){
        return $this->hasMany(Seminar::class);
    }

    public function achievments(){
        return $this->hasMany(Achievment::class);
    }

    public function business(){
        return $this->hasOne(Business::class);
    }
}
