<?php include_once "./app/views/admin/Show/header.php"; ?>


<main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle"><?=$h1 ?></h1>
                <a class="btn btn-primary" href="<?= BASE_URL . 'mon-hoc'?>">Quay lại</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Mã Quizs</th>
                                        <th>Tên Quizs</th>
                                        <th>Môn</th>
                                        <th>Thời gian làm bài</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Xáo trộn</th>
                                        <th>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                                                Tạo mới
                                            </button>
                                            <!-- Create -->
                                            <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?= BASE_URL . 'quiz/luu-tao-moi'?>" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm quizs</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tên Quiz</label>
                                                                <input type="text" name="name" class="form-control" placeholder="Nhập vào tên quizs">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Môn học</label>
                                                                <select name="subject_id" class="form-select flex-grow-1">
                                                                    <?php foreach($subjects as $sub): ?>
                                                                        <option hidden <?php if($_GET['id'] == $sub->id): ?> selected <?php endif ?> 
                                                                        value="<?=$sub->id?>"><?=$sub->name?> </option>
                                                                        <option value="<?=$sub->id?>"><?=$sub->name?> </option>
                                                                    <?php endforeach ?>
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
                                                                        <option value="0"> Có </option>
                                                                        <option value="1"> Không </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Đảo trộn</label>
                                                                <select name="is_shuffle" class="form-select flex-grow-1">
                                                                        <option value="0"> Có </option>
                                                                        <option value="1"> Không </option>
                                                                </select>
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
                                <?php foreach($quizDetail as $quiz): ?>
                                    <tr>
                                        <td><?= $quiz->id ?></td>
                                        <td><?= $quiz->name ?></td>
                                        <td>
                                            <?php foreach ($subjects as $c) : ?>
                                                <?php
                                                if ($c->id == $quiz->subject_id) {
                                                    echo $c->name;
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $quiz->duration_minutes ?></td>
                                        <td><?= $quiz->start_time ?></td>
                                        <td><?= $quiz->end_time ?></td>
                                        <?php if($quiz->status == 0){
                                            $quizs = "Có";
                                        }else{
                                            $quizs = "Không";
                                        }  ?>
                                        <td><?= $quizs ?></td>

                                        <?php if($quiz->is_shuffle == 0){
                                            $shuffle = "Có";
                                        }else{
                                            $shuffle = "Không";
                                        }  ?>
                                        <td><?= $shuffle ?></td>

                                        <td>
                                            <a href="<?= BASE_URL . 'quiz-update?id=' . $quiz->id ?>">Sửa</a>
                                            <a href="<?= BASE_URL . 'quiz/xoa?id=' . $quiz->id ?>">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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

<?php include_once "./app/views/admin/Show/footer.php"; ?>