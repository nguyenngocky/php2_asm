hello {{$_SESSION['sinhvien']['name']}} <a href="{{BASE_URL . 'students/out'}}">Đăng xuất</a>

<table>
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