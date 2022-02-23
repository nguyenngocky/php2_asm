hello {{$_SESSION['sinhvien']['name']}} <a href="{{BASE_URL . 'students/out'}}">Đăng xuất</a>

<table>
    <thead>
        <th>STT</th>
        <th>Tên Quiz</th>
        <th>Tên môn</th>
    </thead>
    <tbody>
        @foreach($quiz as $q)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{BASE_URL . 'students/lam-bai/' .$q->id}}">{{$q->name}}</a></td>
            <td>{{$subject->name}}</td>
        </tr>

        @endforeach
    </tbody>
</table>