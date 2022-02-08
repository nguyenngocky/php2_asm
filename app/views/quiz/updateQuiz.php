<?php include_once "./app/views/admin/Show/header.php"; ?>
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL . 'quiz/luu-update?id=' . $model->id ?>" method="post">

                       <div class="mb-3">
                            <label class="form-label">Tên Quiz</label>
                            <input type="text" name="name" value="<?=$model->name?>" class="form-control" placeholder="Nhập vào tên quizs">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Môn học</label>
                            <select name="subject_id" class="form-select flex-grow-1">
                                <?php foreach($subjects as $sub): ?>
                                    <option <?php if($model->subject_id == $sub->id): ?> selected <?php endif ?> 
                                        value="<?=$sub->id?>"> <?=$sub->name?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thời gian làm bài </label>
                            <input type="number" value="<?=$model->duration_minutes?>" name="duration_minutes" class="form-control" placeholder="Nhập vào thời gian làm bài">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thời gian bắt đầu</label>
                            <input name="start_time" value="<?=$model->start_time?>" type="datetime-local" class="form-control" placeholder="Select date..">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thời gian kết thúc</label>
                            <input name="end_time" value="<?=$model->end_time?>" type="datetime-local" class="form-control" placeholder="Select date..">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select flex-grow-1">
                            <option hidden selected value="<?=$model->status?>"> <?php if($model->status == 0) echo "Có"; else echo "Không";?> </option>
                                <option value="0"> Có </option>
                                <option value="1"> Không </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Đảo trộn</label>
                            <select name="is_shuffle" class="form-select flex-grow-1">
                                <option hidden selected value="<?=$model->is_shuffle?>"> <?php if($model->is_shuffle == 0) echo "Có"; else echo "Không";?> </option>
                                <option value="0"> Có </option>
                                <option value="1"> Không </option>
                            </select>
                        </div>
                        
                        <button name="add" type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="javascript:history.back()">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once "./app/views/admin/Show/footer.php"; ?>