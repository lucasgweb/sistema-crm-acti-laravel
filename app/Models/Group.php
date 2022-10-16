<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'id','teacher_id');
    }
    public function semester()
    {
        return $this->hasOne(Semester::class,'id','semester_id');
    }
    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function modality()
    {
        return $this->hasOne(Modality::class,'id','modality_id');
    }
    public function type()
    {
        return $this->hasOne(Type::class,'id','type_id');
    }
}
