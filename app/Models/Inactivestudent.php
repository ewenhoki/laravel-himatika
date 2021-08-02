<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inactivestudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'generation_id',
        'interest',
        'line',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'salary',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }

    public function educations(){
        return $this->hasMany(Education::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function certifications(){
        return $this->hasMany(Certification::class);
    }
}
