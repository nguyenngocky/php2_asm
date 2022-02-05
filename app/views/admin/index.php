<?php if(isset($_SESSION['auth'])): ?>
    <h2>
    Xin chào <?=$_SESSION['name']?> <a href="<?= BASE_URL . 'log-out'?>">Đăng xuất</a>
</h2>
<?php else: ?>
    <?php header('location: '. BASE_URL .'login'); ?>
<?php endif; ?>