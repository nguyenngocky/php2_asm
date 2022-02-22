@extends('layouts.admin')
@section('content')
@section('title', 'Danh sách câu hỏi')

<main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                
                <h1 class="h3 d-inline align-middle"><?=$h1 ?> {{$Quiz->name}} </h1>
                <a class="btn btn-primary" href="{{BASE_URL . 'quizs/chi-tiet/' . $Quiz->subject_id}}">Quay lại</a>
            </div>
            <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                Tạo mới
            </button>
            


            <div class="row">
                
            <!-- new question -->
                @foreach($question as $ques)
                <div class="col-12 col-md-6 col-lg-5">
            
                    <div class="card">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown show">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="<?= BASE_URL . 'questions/update/' . $ques->id ?>">Sửa</a>
                                        <a class="dropdown-item" href="<?= BASE_URL . 'questions/xoa/' . $ques->id ?>">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($ques->img == "")
                            <p class="text-center">No photo</p>
                            @else
                            <img class="card-img-top" src="<?= IMG_URL . $ques->img?>" alt="Unsplash">
                            @endif
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nội dung câu hỏi số {{$loop->iteration}} : <span style="color: black;">{{$ques->name}}</span></h5>
                            </div>
                            <button type="button" style="margin: auto; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#defaultModalDanger{{$loop->iteration}}" class="btn btn-pill btn-success">Thêm câu trả lời</button>
                            <!-- create answer -->
                            <div class="modal fade" id="defaultModalDanger{{$loop->iteration}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <form action="<?= BASE_URL . 'answers/luu-tao'?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Thêm câu trả lời</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Question</label>
                                                    <select name="question_id" class="form-select flex-grow-1">
                                                        <option value="{{$ques->id}}">{{$ques->name}}</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nhập đáp án</label>
                                                    <input type="text" name="content" class="form-control" placeholder="Nhập vào câu trả lời">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Đáp án đúng ?</label>
                                                    <input type="checkbox" value="1" name="is_correct"> Đúng 
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label w-100">Ảnh ( nếu có )</label>
                                                    <input  name="img" type="file">
                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end answer -->
                        </div>
                        <ul class="list-group list-group-flush">
                                <?php foreach ($ques->getAnswers() as $ansIndex => $ans) : ?>
                                    <li class="list-group-item">
                                        Đáp án <?= $ansIndex + 1 ?>: <strong style="margin-left: 10px;"><?= $ans->content ?>
                                        <img src="{{IMG_URL . $ans->img}}" width="150px" alt=""></strong> 
                                        <a class="float-end" href="<?= BASE_URL . 'answers/xoa/'. $ans->id?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a> 
                                        <a style="margin-right: 5px;" class="float-end" href="<?= BASE_URL . 'answers/update/'. $ans->id?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                        <?php if($ans->is_correct == 1) echo '<span class="float-end"><i class="align-middle me-2 fas fa-fw fa-check"></i></span>'?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        
                    </div>

                    
                </div> 
                @endforeach
                <!-- end question -->
                        

            </div>


        <!-- Create -->
        <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= BASE_URL . 'questions/luu-tao'?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm câu hỏi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tiêu đề câu hỏi</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tiêu đề câu hỏi">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Quizs</label>
                                    <select name="quiz_id" class="form-select flex-grow-1">
                                        <option value="{{$Quiz->id}}">{{$Quiz->name}}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label w-100">Ảnh ( nếu có )</label>
                                    <input name="img" type="file">
                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
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