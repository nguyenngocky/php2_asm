<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;

class AnswersController {
    public function index() {
        $title = "Danh sách câu trả lời";
        $h1 = "Danh sách câu trả lời của ";
        $answers = Answer::all();
        $question = Question::all();
        
        include_once "./app/views/answers/index.php";
    }

    public function save_answers_new(){
        if(isset($_POST['add'])){
            $model = new Answer();
            // kiểm tra xem ảnh có được up lên không
            $filename = "";
            $imgvalue = $_FILES['img'];
            if($imgvalue['size'] > 0){
                $filename = uniqid(). '-' . $imgvalue['name'];
                move_uploaded_file($imgvalue['tmp_name'], 'img/photos/' .$filename);
                $filename = 'img/photos/' . $filename;
            }
            $data = [
                'content' => $_POST['content'],
                'question_id' => $_POST['question_id'],
                'is_correct' => $_POST['is_correct'],
                'img' => $imgvalue,
            ];
            $model->insert($data);
            header('location: ' .$_SERVER['HTTP_REFERER'] );
            die;
        }
    }

    public function xoa_answers(){
        $id = $_GET['id'];
        Answer::destroy($id);
        header('location: ' .$_SERVER['HTTP_REFERER']);
        die;
    }

    public function update_answers(){
        $id = $_GET['id'];
        $title = "Sửa Answers";
        $question = Question::all();
        $model = Answer::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'answers');
            die;
        }

        include_once "./app/views/answers/update.php";
    }

    public function update_answers_luu(){
        $id = $_GET['id'];
        $idques = $_POST['question_id'];

        $model = Question::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'answers');
            die;
        }

        $data = [
            'content' => $_POST['content'],
            'question_id' => $_POST['question_id'],
            'is_correct' => $_POST['is_correct'],
        ];
        $model->update($data);
        header('location: ' . BASE_URL . 'answers?id='.$idques);
        die;
    }

    
}


?>