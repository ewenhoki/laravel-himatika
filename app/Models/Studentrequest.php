<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentrequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'generation_id',
        'reason',
        'confirm',
        'avatar',
        'name',
        'npm',
        'email',
        'phone',
        'gender',
        'birth_data',
        'blood_group',
        'religion',
        'address',
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
        'organization',
        'committee',
        'seminar',
        'achievment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }
}
