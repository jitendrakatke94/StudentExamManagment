<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentExam extends Model
{
    use SoftDeletes;

    public function student(){
        return $this->belongsTo('App\Student','student_id');
    }

    public function exam(){
        return $this->belongsTo('App\Exam','exam_id');
    }
}
