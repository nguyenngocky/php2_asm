<?php include_once "./app/views/admin/Show/header.php"; ?>
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL . 'question/luu-update?id=' . $model->id ?>" method="post">

                       <div class="mb-3">
                            <label class="form-label">Đáp án</label>
                            <input type="text" name="content" value="<?=$model->content?>" class="form-control" placeholder="Nhập vào đáp án">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tiêu đề câu hỏi</label>
                            <select name="question_id" class="form-select flex-grow-1">
                                <?php foreach($question as $ques): ?>
                                    <option <?php if($model->question_id == $ques->id): ?> selected <?php endif ?> 
                                        value="<?=$ques->id?>"> <?=$ques->name?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Đáp án đúng ?</label>
                            <input type="checkbox" value="1" <?php if($model->is_correct == 1) : ?>  checked <?php endif; ?> name="is_correct"> Đúng 
                        </div>

                        
                        <button name="add" type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="javascript:history.back()">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once "./app/views/admin/Show/footer.php"; ?>