<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'inactivestudent_id',
        'company_name',
        'year',
        'position',
    ];

    public function inactivestudent(){
        return $this->belongsTo(Inactivestudent::class);
    }
}
