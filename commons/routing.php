<?php

use App\Controllers\AnswersController;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\QuestionController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

function applyRouting($url){
    $router = new RouteCollector();

    $router->filter('check-login', function(){
        if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
            header('location: '. BASE_URL . 'login');
            die;
        }
    });

    // trang chủ
    $router->get('/', [DashboardController::class, 'index'], ['before' => 'check-login']);

    //trang đăng ký
    $router->get('sign-up', [LoginController::class, 'sign_up']); // mở giao diện đăng ký
    $router->post('sign-up', [LoginController::class, 'luu_sign_up']); // lưu đăng ký

    //trang đăng nhập
    $router->any('login', [LoginController::class, 'index']); // trang giao diện đăng nhập
    $router->post('login', [LoginController::class, 'check']); // kiểm tra đăng nhập

    // đăng xuất
    $router->any('log-out', function (){
        unset($_SESSION['auth']);
        header('location: ' . BASE_URL . 'login');
        die;
    });

    // trang dasboard
    $router->get('dashboard', [DashboardController::class, 'index'], ['before' => 'check-login']);

    // trang môn học
    $router->get('mon-hoc', [SubjectController::class, 'index'], ['before' => 'check-login']); // giao diện trang môn học
    $router->post('mon-hoc/luu-tao-moi', [SubjectController::class, 'saveAdd']); // trang lưu tạo mới môn học
    $router->get('mon-hoc-cap-nhat', [SubjectController::class, 'cap_nhat'], ['before' => 'check-login']); // trang giao diện sửa môn học
    $router->post('mon-hoc/luu-cap-nhat', [SubjectController::class, 'luu_cap_nhat']); // trang lưu sửa môn học
    $router->any('mon-hoc/xoa', [SubjectController::class, 'remove']); // xóa môn học

    // trang Quizs
    $router->get('mon-hoc-chi-tiet', [QuizController::class, 'chi_tiet_quiz'], ['before' => 'check-login']); // giao diện trang quizs
    $router->post('quiz/luu-tao-moi', [QuizController::class, 'quiz_luu_add']); // trang lưu tạo mới quizs
    $router->get('quiz-update', [QuizController::class, 'update_quiz'], ['before' => 'check-login']); // trang giao diện sửa quizs
    $router->post('quiz/luu-update', [QuizController::class, 'update_quiz_luu']); // trang lưu sửa quizs
    $router->any('quiz/xoa', [QuizController::class, 'xoa_quiz']); // xóa quiz

    // trang câu hỏi
    $router->get('question', [QuestionController::class, 'index'], ['before' => 'check-login']); // giao diện trang question
    $router->post('question/luu-tao', [QuestionController::class, 'save_question_new']); // trang lưu tạo mới question
    $router->get('question-update', [QuestionController::class, 'update_question'], ['before' => 'check-login']); // trang giao diện sửa question
    $router->post('question/luu-update', [QuestionController::class, 'update_question_luu']); // trang lưu sửa question
    $router->any('question/xoa', [QuestionController::class, 'xoa_question']); // xóa question

    // trang câu trả lời
    $router->get('answers', [AnswersController::class, 'index'], ['before' => 'check-login']); // giao diện trang answers
    $router->post('answers/luu-tao', [AnswersController::class, 'save_answers_new']); // trang lưu tạo mới answers
    $router->get('answers-update', [AnswersController::class, 'update_answers'], ['before' => 'check-login']); // trang giao diện sửa answers
    // $router->post('question/luu-update', [QuestionController::class, 'update_question_luu']); // trang lưu sửa answers
    // $router->any('question/xoa', [QuestionController::class, 'xoa_question']); // xóa answers


    // $router->group(['prefix' => 'mon-hoc'], function($router){
    //     $router->get('/', [SubjectController::class, 'index'], ['before' => 'check-login']);
    //     $router->get('tao-moi', [SubjectController::class, 'addForm']);
    //     $router->post('tao-moi', [SubjectController::class, 'saveAdd']);
    //     $router->get('{subjectId}/cap-nhat', 
    //         [SubjectController::class, 'editForm']);
    //     $router->get('xoa/{id}', [LoginController::class, 'remove']);
        // tham số {}
        // 2 loại 
        // - tham số bắt buộc : {id}
        // - tham số tuỳ chọn : {id}?
        // $router->get('cap-nhat/{id}/{name}?', [SubjectController::class, 'editForm']);
    // });
    



    $dispatcher = new Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    
    // Print out the value returned from the dispatched function
    echo $response;
}

?>