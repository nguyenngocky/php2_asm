<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;

class AnswersController {
    public function index($id) {
        $h1 = "Danh sách câu trả lời của ";
        $answers = Answer::where('question_id', $id)->get();
        $question = Question::find($id);
        // echo "<pre>";
        // var_dump($question);die;
        
        return view('admin.answer.index', [
            'h1' => $h1,
            'answers' => $answers,
            'question' => $question,
        ]);
    }

    public function save_answers_new(){
        if(isset($_POST['add'])){
            $model = new Answer();
            // thêm ảnh
            $filename = "";
            $imgvalue = $_FILES['img'];
            if($imgvalue['size'] > 0){
                $filename = uniqid(). '-' . $imgvalue['name'];
                move_uploaded_file($imgvalue['tmp_name'], './public/img/photos/' .$filename);
                $imgvalue = $filename;
            }

            $data = [
                'content' => $_POST['content'],
                'question_id' => $_POST['question_id'],
                'is_correct' => $_POST['is_correct'],
                'img' => $filename,
            ];
            $model->insert($data);
            header('location: ' .$_SERVER['HTTP_REFERER'] );
            die;
        }
    }

    public function xoa_answers($id){
        Answer::destroy($id);
        header('location: ' .$_SERVER['HTTP_REFERER']);
        die;
    }

    public function update_answers($id){
        
        $question = Question::all();
        $model = Answer::where('id', '=', $id)->first();
        if(!$model){
            header('location: ' . BASE_URL . 'answers');
            die;
        }

        return view('admin.answer.update', [
            'model' => $model,
            'question' => $question,
        ]);
    }

    public function update_answers_luu($id){
        $idques = $_POST['question_id'];
        $urlC = Question::where('id', '=', $idques)->first();
        $urlBack = $urlC->quiz_id;

        $model = Answer::where('id', '=', $id)->first();
        if(!$model){
            header('location: ' .$_SERVER['HTTP_REFERER'] );
            die;
        }

        $model->content = $_POST['content'];
        $model->question_id = $_POST['question_id'];
        $model->is_correct = $_POST['is_correct'];
        $model->save();
        header('location: ' . BASE_URL . 'questions/chi-tiet/'.$urlBack);
        die;
    }

    
}


?>