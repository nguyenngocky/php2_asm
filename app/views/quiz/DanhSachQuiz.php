<?php include_once "./app/views/admin/Show/header.php"; ?>


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
                                        <th>Mã Quizs</th>
                                        <th>Tên Quizs</th>
                                        <th>Môn</th>
                                        <th>Thời gian làm bài</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Xáo trộn</th>
                                        <th>
                                            <a href="<?= BASE_URL . 'quiz-tao-moi'?>">Tạo mới</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($Quiz as $quiz): ?>
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