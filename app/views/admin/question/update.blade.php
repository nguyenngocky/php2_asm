@extends('layouts.admin')
@section('content')
@section('title', 'Danh sách câu hỏi')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL . 'questions/luu-update/' . $model->id ?>" method="post" enctype="multipart/form-data">

                       <div class="mb-3">
                            <label class="form-label">Tiêu đề câu hỏi</label>
                            <input type="text" name="name" value="<?=$model->name?>" class="form-control" placeholder="Nhập vào tiêu đề câu hỏi">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ảnh</label>
                            <input type="file" name="img" class="form-control">
                        </div>

                        <div class="mb-3">
                            @if($model->img == "")
                            
                            @else
                            <img src="<?= IMG_URL . $model->img?>" width="150px" >
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tên quiz</label>
                            <select name="quiz_id" class="form-select flex-grow-1">
                                <?php foreach($Quizs as $quiz): ?>
                                    <option <?php if($model->quiz_id == $quiz->id): ?> selected <?php endif ?> 
                                        value="<?=$quiz->id?>"> <?=$quiz->name?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        
                        <button name="add" type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="javascript:history.back()">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection