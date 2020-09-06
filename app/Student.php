<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    public function studentExams()
    {
        return $this->belongsToMany('App\Exam', 'student_exams', 'student_id', 'exam_id');
    }
}
