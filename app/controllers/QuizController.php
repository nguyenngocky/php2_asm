<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

    class QuizController{

        public function index($id){
            
                $h1 = "Danh sách quizs";
                $subjects = Subject::find($id);
                $quizDetail = Quiz::where('subject_id', '=' , $id) ->get();

                return view('admin.quiz.index', [
                    'h1' => $h1,
                    'quizDetail' => $quizDetail,
                    'subjects' => $subjects,
                ]);
            
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

        public function xoa_quiz($id){
            Quiz::destroy($id);
            header('location: ' .$_SERVER['HTTP_REFERER']);
            die;
        }
        
        public function update_quiz($id){
            
            $subjects = Subject::all();
            $model = Quiz::where('id', '=', $id)->first();
            if(!$model){
                header('location: ' . BASE_URL . 'danh-sach-quiz');
                die;
            }

            return view('admin.quiz.update', [
                'model' => $model,
                'subjects' => $subjects,
            ]);
        }

        public function update_quiz_luu($id){
            $idsub = $_POST['subject_id'];

            $model = Quiz::where('id', '=', $id)->first();
            if(!$model){
                header('location: ' . BASE_URL . 'danh-sach-quiz');
                die;
            }

            $model->name = $_POST['name'];
            $model->subject_id = $_POST['subject_id'];
            $model->duration_minutes = $_POST['duration_minutes'];
            $model->start_time = $_POST['start_time'];
            $model->end_time = $_POST['end_time'];
            $model->status = $_POST['status'];
            $model->is_shuffle = $_POST['is_shuffle'];
            $model->save();
            header('location: ' . BASE_URL . 'quizs/chi-tiet/'.$idsub);
            die;
        }

    }
?>