<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
        'status',
        'remuneration'
    ];
    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
