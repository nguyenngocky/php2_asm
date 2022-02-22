<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Quiz;

    class QuestionController{

        public function index($id){
            $h1 = "Danh sách câu hỏi của ";
            $Quiz = Quiz::find($id);
            $question = Question::where('quiz_id', '=', $id) ->get();
            // echo "<pre>";
            // var_dump($Quiz);die;
            
            return view('admin.question.index', [
                'h1' => $h1,
                'question' => $question,
                'Quiz' => $Quiz,
            ]);
        }

        public function save_question_new(){
            if(isset($_POST['add'])){
                $model = new Question();
               
                $filename = "";
                $imgvalue = $_FILES['img'];
                if($imgvalue['size'] > 0){
                    $filename = uniqid(). '-' . $imgvalue['name'];
                    move_uploaded_file($imgvalue['tmp_name'], './public/img/photos/' .$filename);
                    $imgvalue = $filename;
                    // var_dump($filename);die;
                }
                $data = [
                    'name' => $_POST['name'],
                    'quiz_id' => $_POST['quiz_id'],
                    'img' => $filename,
                ];
                $model->insert($data);
                header('location: ' .$_SERVER['HTTP_REFERER'] );
                die;
            }
        }

        public function xoa_question($id){
            Question::destroy($id);
            header('location: ' .$_SERVER['HTTP_REFERER']);
            die;
        }

        public function update_question($id){
            $Quizs = Quiz::all();
            $model = Question::where('id', '=', $id)->first();
            if(!$model){
                header('location: ' . BASE_URL . 'question');
                die;
            }

            return view('admin.question.update', [
                'Quizs' => $Quizs,
                'model' => $model,
            ]);
        }

        public function update_question_luu($id){
            $idquiz = $_POST['quiz_id'];

            $model = Question::where('id', '=', $id)->first();
            $img = $_FILES['img'];
            $imgValue = $model->img;
            $filename = "";
            if ($img['size'] > 0) {
                $filename = uniqid() . '-' . $img['name'];
                move_uploaded_file($img['tmp_name'], './public/img/photos/' .$filename);
            }elseif($img['size'] == 0){
                $filename = $imgValue;
            }
            // var_dump($filename);die;

            if(!$model){
                header('location: ' . BASE_URL . 'questions');
                die;
            }
            $model->name = $_POST['name'];
            $model->quiz_id = $idquiz;
            $model->img = $filename;
            $model->save();
            header('location: ' . BASE_URL . 'questions/chi-tiet/'.$idquiz);
            die;
        }
    }

?>