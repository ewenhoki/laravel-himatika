<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnirequest extends Model
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
        'interest',
        'line',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'salary',
        'education',
        'job',
        'certification',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }
}
