<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    
    protected $table = 'educations';
    
    protected $fillable = [
        'inactivestudent_id',
        'level',
        'major',
        'university',
        'year',
    ];

    public function inactivestudent(){
        return $this->belongsTo(Inactivestudent::class);
    }
}
