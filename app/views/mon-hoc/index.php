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
                                        <th>Mã môn</th>
                                        <th>Tên môn</th>
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
                                                                        <input type="hidden" name="author_id" value="<?=$_SESSION['id']?>">
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
                                <?php foreach($subjects as $sub): ?>
                                    <tr>
                                        <td><?= $sub->id ?></td>
                                        <td><?= $sub->name ?></td>
                                        <td>
                                            <?php foreach ($user as $c) : ?>
                                                <?php
                                                if ($c->id == $sub->author_id) {
                                                    echo $c->name;
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL . 'mon-hoc-cap-nhat?id=' . $sub->id ?>">Sửa</a>
                                            <a href="<?= BASE_URL . 'mon-hoc/xoa?id=' . $sub->id ?>">Xóa</a>
                                            <a href="<?= BASE_URL . 'mon-hoc-chi-tiet?id=' . $sub->id ?>">Chi tiết</a>
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