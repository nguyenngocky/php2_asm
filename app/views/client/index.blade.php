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
            <h1>Chào {{$_SESSION['sinhvien']['name']}} <a href="{{BASE_URL . 'students/out'}}">Đăng xuất</a></h1>

            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Tên môn</th>
                </thead>
                <tbody>
                    @foreach($subject as $sub)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{BASE_URL . 'students/ds-quiz/' .$sub->id}}">{{$sub->name}}</a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>