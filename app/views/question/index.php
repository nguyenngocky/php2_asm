<?php include_once "./app/views/admin/Show/header.php"; ?>

<main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                
                <h1 class="h3 d-inline align-middle"><?=$h1 ?> <?php foreach($Quiz as $quiz): ?> <?php if($_GET['id'] == $quiz->id) echo $quiz->name ?> <?php endforeach ?></h1>
                <a class="btn btn-primary" href="javascript:history.back();">Quay lại</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Mã Câu hỏi</th>
                                        <th>Tiêu đề Câu hỏi</th>
                                        <th>Quizs</th>
                                        <th>Ảnh</th>
                                        <th>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                                                Tạo mới
                                            </button>
                                            <!-- Create -->
                                            <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?= BASE_URL . 'question/luu-tao'?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm câu hỏi</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tiêu đề câu hỏi</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên quizs">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Quizs</label>
                                                                    <select name="quiz_id" class="form-select flex-grow-1">
                                                                        <?php foreach($Quiz as $quiz): ?>

                                                                            <option hidden <?php if($_GET['id'] == $quiz->id): ?> selected <?php endif ?> 
                                                                            value="<?=$quiz->id?>"> <?=$quiz->name?> </option>

                                                                            <option value="<?=$quiz->id?>"><?=$quiz->name?> </option>
                                                                        <?php endforeach ?>
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
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($question as $ques): ?>
                                    <tr>
                                        <td><?= $ques->id ?></td>
                                        <td><?= $ques->name ?></td>
                                        <td>
                                            <?php foreach ($Quiz as $c) : ?>
                                                <?php
                                                if ($c->id == $ques->quiz_id) {
                                                    echo $c->name;
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $ques->img ?></td>

                                        <td>
                                            <a href="<?= BASE_URL . 'question-update?id=' . $ques->id ?>">Sửa</a>
                                            <a href="<?= BASE_URL . 'question/xoa?id=' . $ques->id ?>">Xóa</a>
                                            <a href="<?= BASE_URL . 'question?id=' . $ques->id ?>">Thêm câu trả lời</a>
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