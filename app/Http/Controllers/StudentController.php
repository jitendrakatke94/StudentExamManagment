<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Resources\StudentResource;
use App\Student;
use App\StudentExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function studentRegistration(Request $request){
        $validator = $this->studentValidator($request->all());
        $student = new Student();
        $student->name = $validator['name'];
        $student->email = $validator['email'];
        $student->save();
        foreach ($validator['stuent_exams'] as $student_exam) {
            $studentExam = new StudentExam();
            $studentExam->student_id = $student->id;
            $studentExam->exam_id = $student_exam;
            $studentExam->save();
        }
        return 'ok';
    }
    public function studentValidator($request){
        $validateData = Validator::make($request, [
            'name'=>'required',
            'email'=>'required|email',
            'stuent_exams'=>'required'
        ])->validate();
        return $validateData;
    }

    public function studentList(){
        return view('student_list')->with('students', StudentResource::collection(Student::all())) ;
    }

    public function addExams(Request $request){
        $validator = $request->validate([
            'exam_name' => 'required'
        ]);
        $exam = new Exam();
        $exam->exam_name = $validator['exam_name'];
        $exam->save();
        return 'ok';
    }
}
