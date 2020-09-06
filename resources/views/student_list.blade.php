<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Student List</title>
</head>
<body>
<div><a href="/registrationForm"><button>Add student</button></a></div>
{{--{{dd($students)}}--}}
<table id="student_list">
    <thead>
    <tr>
        <th>Student Name</th>
        <th>Email</th>
        <th>Exams</th>
    </tr>
    </thead>
    <tbody>
    @if($students)
        @foreach($students as $student)
            <tr id="{{$student->id}}">
                <td style="text-align: center">{{$student->name}}</td>
                <td style="text-align: center">{{$student->email}}</td>
                <td style="text-align: center">@foreach($student->studentExams as $exam) {{$exam->exam_name}}, @endforeach</td>
            </tr>
        @endforeach
    @endif
    </tbody>

</table>
</body>


<script >
    $(document).ready(function() {
        $('#student_list').DataTable();
    } );
</script>
</html>