<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
        <div class="container">
@if(isset($studentQuiz->student_id) && $studentQuiz->student_id == $_SESSION['sinhvien']['id'])

<span class="text-red">
    Điểm của bạn là: {{$studentQuiz->score}}
    <a href="javascript:history.back();">Quay lại</a>
</span>

@else

<h2>{{$quiz->name}}</h2>
<p>Thời gian: {{$quiz->duration_minutes}} phút</p>
<hr>
<form action="" method="POST">
    @foreach ($questions as $item)
    <fieldset>
        <legend class="border">Câu hỏi {{$loop->iteration}}: {{$item->name}}</legend>
        <ul>
            @foreach ($item->answers as $ans)
                <li> 
                    <input type="radio" name="question_{{$item->id}}" id="{{$ans->id}}" value="{{$ans->id}}">
                    <label for="{{$ans->id}}">{{$ans->content}}</label>
                </li>
            @endforeach
        </ul>
    </fieldset>    
    @endforeach
    <button class="btn btn-primary" type="submit">Nộp bài</button> <a href="javascript:history.back();">Quay lại trang chủ</a>
</form>

@endif
</div>
</body>
</html>