<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

if(isset($_SESSION['auth'])){
    class QuizController{

        public function DanhSachQuiz(){
            $title = "Danh sách Quizs";
            $h1 = "Danh sách Quizs";
            $Quiz = Quiz::all();
            $subjects = Subject::all();
            include_once "./app/views/quiz/DanhSachQuiz.php";
        }

        public function addQuiz(){
            $title = "Tạo mới quizs";
            $subjects = Subject::all();

            include_once "./app/views/quiz/addQuiz.php";
        }

        public function quiz_luu_add(){
            if(isset($_POST['add'])){
                $model = new Quiz();
                $data = [
                    'name' => $_POST['name'],
                    'subject_id' => $_POST['subject_id'],
                    'duration_minutes' => $_POST['duration_minutes'],
                    'start_time' => $_POST['start_time'],
                    'end_time' => $_POST['end_time'],
                    'status' => $_POST['status'],
                    'is_shuffle' => $_POST['is_shuffle'],
                ];
                $model->insert($data);
                header('location: ' .$_SERVER['HTTP_REFERER'] );
                die;
            }
        }

        public function xoa_quiz(){
            $id = $_GET['id'];
            Quiz::destroy($id);
            header('location: ' .$_SERVER['HTTP_REFERER']);
            die;
        }
        
        public function update_quiz(){

            $id = $_GET['id'];
            $title = "Sửa Quizs";
            $subjects = Subject::all();
            $model = Quiz::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'danh-sach-quiz');
                die;
            }

            include_once "./app/views/quiz/updateQuiz.php";
        }

        public function update_quiz_luu(){
            $id = $_GET['id'];
            $model = Quiz::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'danh-sach-quiz');
                die;
            }
    
            $data = [
                'name' => $_POST['name'],
                'subject_id' => $_POST['subject_id'],
                'duration_minutes' => $_POST['duration_minutes'],
                'start_time' => $_POST['start_time'],
                'end_time' => $_POST['end_time'],
                'status' => $_POST['status'],
                'is_shuffle' => $_POST['is_shuffle'],
            ];
            $model->update($data);
            header('location: ' . BASE_URL . 'danh-sach-quiz');
            die;
        }

        public function chi_tiet_quiz(){
            $title = "Danh sách quiz";
            $h1 = "Danh sách quiz";
            $subjects = Subject::all();
            $id = $_GET['id'];
            $quizDetail = Quiz::where(['subject_id', '=' , $id]) ->get();

            include_once "./app/views/mon-hoc/chi-tiet-quiz.php";
        }

    }

}else{
    header('location: '. BASE_URL .'login');
}
?>