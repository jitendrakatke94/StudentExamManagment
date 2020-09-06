<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use SoftDeletes;

    public function studentExams(){
        return $this->hasMany('App\StudentExam', 'exam_id');
    }
}
