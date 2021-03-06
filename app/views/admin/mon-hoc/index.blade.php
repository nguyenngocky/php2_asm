@extends('layouts.admin')
@section('content')
@section('title', 'Danh sách môn học')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle"><?=$h1?></h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên môn</th>
                                        <th>Số quiz</th>
                                        <th>Người tạo gần đây</th>
                                        <th>
                                            
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                                                Tạo mới
                                            </button>
                                            <!-- Create -->
                                            <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?= BASE_URL . 'mon-hoc/luu-tao-moi'?>" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm môn học</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body m-3">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title mb-0">Tên môn học</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <input type="text" name="name" class="form-control" placeholder="Nhập vào tên môn học">
                                                                        <input type="hidden" name="author_id" value="{{$_SESSION['auth']['id']}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end create -->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $sub)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sub->name}}</td>
                                        <td>{{count($sub->quizs)}}</td>
                                        <td>
                                            @foreach ($user as $c) 
                                               
                                                @if ($c->id == $sub->author_id)
                                                      {{$c->name}}
                                                @endif
                                                
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{BASE_URL . 'mon-hoc/cap-nhat/' . $sub->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a href="{{ BASE_URL . 'mon-hoc/xoa/' . $sub->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                            <a href="{{ BASE_URL . 'quizs/chi-tiet/' . $sub->id }}">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	</main>
    <script src="js/datatables.js"></script>
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>

@endsection