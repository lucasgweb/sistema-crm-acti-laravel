<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'course_id',
        'document',
        'address',
        'status'
    ];

    public function course(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
