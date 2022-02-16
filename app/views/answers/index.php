<?php include_once "./app/views/admin/Show/header.php"; ?>

<main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                
                <h1 class="h3 d-inline align-middle"><?=$h1 ?> <?php foreach($question as $ques): ?> <?php if($_GET['id'] == $ques->id) echo $ques->name ?> <?php endforeach ?></h1>
                <a class="btn btn-primary" href="javascript:history.back();">Quay lại</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Mã Câu trả lời</th>
                                        <th>Câu hỏi</th>
                                        <th>Câu trả lời</th>
                                        <th>Đáp án đúng?</th>
                                        <th>Ảnh</th>
                                        <th>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                                                Tạo mới
                                            </button>
                                            <!-- Create -->
                                            <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?= BASE_URL . 'answers/luu-tao'?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm câu trả lời</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nhập đáp án</label>
                                                                    <input type="text" name="content" class="form-control" placeholder="Nhập vào câu trả lời">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Đáp án đúng ?</label>
                                                                    <input type="checkbox" value="1" name="is_correct"> Đúng 
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Question</label>
                                                                    <select name="question_id" class="form-select flex-grow-1">
                                                                        <?php foreach($question as $ques): ?>

                                                                            <option hidden <?php if($_GET['id'] == $ques->id): ?> selected <?php endif ?> 
                                                                            value="<?=$ques->id?>"> <?=$ques->name?> </option>

                                                                            <option value="<?=$ques->id?>"><?=$ques->name?> </option>
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
                                <?php foreach($answers as $ans): ?>
                                    <tr>
                                        <td><?= $ans->id ?></td>
                                        <td>
                                            <?php foreach ($question as $c) : ?>
                                                <?php
                                                if ($c->id == $ans->question_id) {
                                                    echo $c->name;
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $ans->content ?></td>
                                        <td><?php if($ans->is_correct == 1) echo "đúng"; else echo "sai"?></td>
                                        <td><?= $ans->img ?></td>

                                        <td>
                                            <a href="<?= BASE_URL . 'answers-update?id=' . $ans->id ?>">Sửa</a>
                                            <a href="<?= BASE_URL . 'answers/xoa?id=' . $ans->id ?>">Xóa</a>
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