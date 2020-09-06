
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
    <h2>Add Exams</h2>
    <div class="container" style="width:75%">
        <div class="row">
            <div class="col-25">
                <label for="">Exam Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="exam_name" placeholder="Exam Name">
            </div>
        </div>

        <div class="row">
            <input type="submit" id="save_exam">
        </div>
    </div>
</div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script>


    $('#save_exam').on('click',function(){
        var exam_name = $('#exam_name').val();

        if(exam_name == ''){
            alert('Student name required');
            return false;
        }
        $.ajax({
            url:'addExam',
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{exam_name:exam_name},
            success:function(response){
                $('#exam_name').val('');
                alert('Data stored successfully');
                window.location.href = 'registrationForm';
            },error:function (error) {
                console.log(error);
                alert(error.responseJSON.message);
            }

        })
    })
</script>
</html>