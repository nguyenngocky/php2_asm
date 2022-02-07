<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';

use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\StudentQuizController;
use App\Controllers\SubjectController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        $ctr = new LoginController();
        $ctr->index();
        break;
    case 'login':
        $ctr = new LoginController();
        $ctr->index();
        // trang đăng nhập
        break;
    case 'check-login':
        $ctr = new LoginController();
        $ctr->check();
        // trang đăng nhập
        break;
    case 'log-out':
        $ctr = new LoginController();
        $ctr->log_out();
        break;
    case 'sign-up':
        $ctr = new LoginController();
        $ctr->sign_up();
        // trang đăng ký
        break;
    case 'sign-up/luu':
        $ctr = new LoginController();
        $ctr->luu_sign_up();
        break;
    case 'dashboard':
        $ctr = new DashboardController();
        $ctr->index();
        // trang chi tiết sản phẩm sẽ có tham số đường dẫn ?id=xxx
        // hiển thị thông tin chi tiết của sản phẩm
        break;
    case 'profile':
        $ctr = new DashboardController();
        $ctr->profile();
        break;
    case 'mon-hoc':
        $ctr = new SubjectController();
        $ctr->index();
        // hiển thị giao diện form tạo mới sản phẩm
        break;
    case 'mon-hoc/luu-tao-moi':
        $ctr = new SubjectController();
        $ctr->saveAdd();
        break;
    case 'mon-hoc-cap-nhat':
        $ctr = new SubjectController();
        $ctr->cap_nhat();
        break;
    case 'mon-hoc/luu-cap-nhat':
        $ctr = new SubjectController();
        $ctr->luu_cap_nhat();
        break;
    case 'mon-hoc/xoa':
        $ctr = new SubjectController();
        $ctr->remove();
        break;
    case 'mon-hoc/chi-tiet':
        break;
    case 'quiz':
        $ctr = new StudentQuizController();
        $ctr->index();
        break;
    case 'danh-sach-quiz':
        $ctr = new QuizController();
        $ctr->DanhSachQuiz();
        break;
    case 'quiz-tao-moi':
        $ctr = new QuizController();
        $ctr->addQuiz();
        break;
    case 'quiz/luu-tao-moi':
        $ctr = new QuizController();
        $ctr->quiz_luu_add();
        break;
    case 'quiz/xoa':
        $ctr = new QuizController();
        $ctr->xoa_quiz();
        break;
    case 'quiz-update':
        $ctr = new QuizController();
        $ctr->update_quiz();
        break;
    case 'quiz/luu-update':
        $ctr = new QuizController();
        $ctr->update_quiz_luu();
        break;

    case 'mon-hoc/quizs/lam-quiz':
        break;
    
    default:
        echo "Sai đường dẫn vui lòng truy cập lại!";
        break;
}
?>