<?php if(isset($_SESSION['auth_sv'])): ?>
    <h2>
    Xin chào <?=$_SESSION['name_sv']?> <a href="<?= BASE_URL . 'log-out'?>">Đăng xuất</a>
</h2>
<?php else: ?>
    <?php header('location: '. BASE_URL .'login'); ?>
<?php endif; ?>