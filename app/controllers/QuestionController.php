<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Quiz;

    class QuestionController{

        public function index(){
            $title = "Danh sách câu hỏi";
            $h1 = "Danh sách câu hỏi của ";
            $question = Question::all();
            $Quiz = Quiz::all();
            
            include_once "./app/views/question/index.php";
        }

        public function save_question_new(){
            if(isset($_POST['add'])){
                $model = new Question();
                // kiểm tra xem ảnh có được up lên không
                $filename = "";
                $imgvalue = $_FILES['img'];
                if($imgvalue['size'] > 0){
                    $filename = uniqid(). '-' . $imgvalue['name'];
                    move_uploaded_file($imgvalue['tmp_name'], 'img/photos/' .$filename);
                    $filename = 'img/photos/' . $filename;
                }
                $data = [
                    'name' => $_POST['name'],
                    'quiz_id' => $_POST['quiz_id'],
                    'img' => $imgvalue,
                ];
                $model->insert($data);
                header('location: ' .$_SERVER['HTTP_REFERER'] );
                die;
            }
        }

        public function xoa_question(){
            $id = $_GET['id'];
            Question::destroy($id);
            header('location: ' .$_SERVER['HTTP_REFERER']);
            die;
        }

        public function update_question(){
            $id = $_GET['id'];
            $title = "Sửa Question";
            $Quizs = Quiz::all();
            $model = Question::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'question');
                die;
            }

            include_once "./app/views/question/update.php";
        }

        public function update_question_luu(){
            $id = $_GET['id'];
            $idquiz = $_POST['quiz_id'];

            $model = Question::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'question');
                die;
            }
    
            $data = [
                'name' => $_POST['name'],
                'quiz_id' => $_POST['quiz_id'],
            ];
            $model->update($data);
            header('location: ' . BASE_URL . 'question?id='.$idquiz);
            die;
        }
    }

?>