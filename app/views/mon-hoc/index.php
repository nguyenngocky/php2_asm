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
                                        <th>tên môn</th>
                                        <th>
                                            <a href="<?= BASE_URL . 'mon-hoc/tao-moi'?>">Tạo mới</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($subjects as $sub): ?>
                                    <tr>
                                        <td><?= $sub->id ?></td>
                                        <td><?= $sub->name ?></td>
                                        <td>
                                            <a href="<?= BASE_URL . 'mon-hoc/cap-nhat?id=' . $sub->id ?>">Sửa</a>
                                            <a href="<?= BASE_URL . 'mon-hoc/xoa?id=' . $sub->id ?>">Xóa</a>
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