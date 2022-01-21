<?php
require_once './commons/helpers.php';
require_once './vendor/autoload.php';


use App\Controllers\SubjectController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case 'login':
        // trang chủ - hiển thị danh sách sản phẩm theo danh mục
        break;
    case 'dashboard':
        // trang chi tiết sản phẩm sẽ có tham số đường dẫn ?id=xxx
        // hiển thị thông tin chi tiết của sản phẩm
        break;
    case 'mon-hoc':
        $ctr = new SubjectController();
        $ctr->index();
        // hiển thị giao diện form tạo mới sản phẩm
        break;
    case 'mon-hoc/tao-moi':
        $ctr = new SubjectController();
        $ctr->addForm();
        // Thực hiện nhận dữ liệu từ màn hình tạo mới
        // lưu dữ liệu vào db 
        // sau đó điều hướng về trang chủ
        break;
    case 'mon-hoc/luu-tao-moi':
        $ctr = new SubjectController();
        $ctr->saveAdd();
        break;
    case 'mon-hoc/xoa':
        $ctr = new SubjectController();
        $ctr->remove();
        break;
    case 'mon-hoc/chi-tiet':
        break;
    case 'mon-hoc/cap-nhat':
        break;
    case 'mon-hoc/luu-cap-nhat':
        break;
    case 'mon-hoc/quizs':
        break;
    case 'mon-hoc/chi-tiet-quizs':
        break;
    case 'mon-hoc/quizs/tao-moi':
        break;
    case 'mon-hoc/quizs/luu-tao-moi':
        break;
    case 'mon-hoc/quizs/lam-quiz':
        break;
    
    default:
        # code...
        break;
}
?>