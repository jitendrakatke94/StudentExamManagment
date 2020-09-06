@php
    $exams = \App\Exam::get();
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        *{
            box-sizing : border-box;
        }

        input[type=text], textarea{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit]{
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        .container{
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <title>Student Registration</title>
</head>
<body>

<div style="text-align: -webkit-center;">
    <h2>Student Registration</h2>
    <div class="container" style="width:75%">
        <div class="row">
            <div class="col-25">
                <label for="pname">Student Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="student_name" placeholder="Student Name" />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="">Student Email</label>
            </div>
            <div class="col-75">
                <input type="text" id="student_email" placeholder="Student Email">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="">Student Exam Names</label>
            </div>
            <div class="col-75">
                <select style="margin-top: 15px;width: 100%;resize: vertical;" id="student_exams" multiple='multiple'>
                    @if(isset($exams))
                        @foreach($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->exam_name}}</option>
                        @endforeach
                    @endif
                </select>
                <a href="examForm">Add Exam</a>
            </div>
        </div>
        <div class="row">
            <input type="submit" id="save">
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<script>
    $(document).ready(function() {
        $('#student_exams').multiselect();
    });

    $('#save').on('click',function(){
        var name = $('#student_name').val();
        var email = $('#student_email').val();
        var student_exams = $('#student_exams').val();
        if(name == ''){
            alert('Student name required');
            return false;
        }
        if (email == ''){
            alert('Student email required');
            return false
        }
        if(student_exams == ''){
            alert('Student exams required');
            return false;
        }
        $.ajax({
            url:'studentRegistration',
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{name:name,email:email,stuent_exams:student_exams},
            success:function(response){
                $('#student_name').val('');
                $('#student_email').val('');
                $('#student_exams').val('');
                alert('Data stored successfully');
                window.location.href = 'studentList';
            },error:function (error) {
                if (error.responseJSON.errors.email){
                    alert(error.responseJSON.errors.email);
                }
                if (error.responseJSON.errors.name){
                    alert(error.responseJSON.errors.name);
                }
                if (error.responseJSON.errors.stuent_exams){
                    alert(error.responseJSON.errors.stuent_exams);
                }
            }

        })
    })
</script>
</html>