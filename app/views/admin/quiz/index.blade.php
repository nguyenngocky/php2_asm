@extends('layouts.admin')
@section('content')
@section('title', 'Danh sách Quizs')

<main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
            
                <h1 class="h3 d-inline align-middle"><?=$h1 ?> {{$subjects->name}}</h1>
                <a class="btn btn-primary" href="<?= BASE_URL . 'mon-hoc'?>">Quay lại</a>
            </div>

            <div class="container-fluid p-0">
            <button  type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
            <i class="fas fa-plus"></i> Tạo mới
            </button>
             <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= BASE_URL . 'quizs/luu-tao-moi'?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm quizs</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên Quiz</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên quizs">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Môn học</label>
                                    <select name="subject_id" class="form-select flex-grow-1">
                                            <option value="<?=$subjects->id?>"><?=$subjects->name?> </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Thời gian làm bài </label>
                                    <input type="number" name="duration_minutes" class="form-control" placeholder="Nhập vào thời gian làm bài">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Thời gian bắt đầu</label>
                                    <input name="start_time" type="datetime-local" class="form-control" placeholder="Select date..">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Thời gian kết thúc</label>
                                    <input name="end_time" type="datetime-local" class="form-control" placeholder="Select date..">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <select name="status" class="form-select flex-grow-1">
                                            <option value="0"> Hoạt động </option>
                                            <option value="1"> Không hoạt động </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Đảo trộn</label>
                                    <select name="is_shuffle" class="form-select flex-grow-1">
                                            <option value="0"> Có </option>
                                            <option value="1"> Không </option>
                                    </select>
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
            
            <div class="row">
                @foreach($quizDetail as $quiz)
                <!-- quiz -->
                <div class="col-12 col-md-6 col-lg-5 ">
                    <div class="card">

                        <div class="card-header px-4 pt-4">
                            <div class="card-actions float-end">
                                <div class="dropdown show">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="<?= BASE_URL . 'quizs/update/' . $quiz->id ?>">Sửa</a>
                                        <a class="dropdown-item" href="<?= BASE_URL . 'quizs/xoa/' . $quiz->id ?>">Xóa</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Quizs số {{$loop->iteration}} có tên: {{$quiz->name}}</h5>
                            <div class="badge bg-success my-2">{{$quiz->status == 0 ? "Hoạt động" : "Không hoạt động"}}</div>
                        </div>

                        <div class="card-body px-4 pt-2">
                            <p><span style="font-weight: bold;">Thời gian làm bài:</span> <span style="color: red">{{$quiz->duration_minutes}} Phút</span></p>
                            <p><span style="font-weight: bold;">Thời gian bắt đầu:</span> <span style="color: red">{{$quiz->start_time}}</span></p>
                            <p><span style="font-weight: bold;">Thời gian kết thúc:</span> <span style="color: red">{{$quiz->end_time}}</span></p>
                            <p><span style="font-weight: bold;">Xáo trộn:</span> <span style="color: red">{{$quiz->is_shuffle == 0 ? "Không" : "Có"}}</span></p>
                            <p><span style="font-weight: bold;">Tổng số câu hỏi:</span> <span style="color: red">{{count($quiz->questions)}}</span></p>
                        </div>
                        <a href="<?= BASE_URL . 'questions/chi-tiet/' . $quiz->id ?>" style="margin: auto; margin-bottom: 10px;" class="btn btn-pill btn-success">Thêm câu hỏi</a>
                    </div>
                </div>
                <!-- end quiz -->
                @endforeach
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