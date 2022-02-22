<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;

class SubjectController{
        
        public function index(){
            $h1 = "Danh sách môn học";
            $subjects = Subject::all();
            $user = User::all();

            // include_once "./app/views/mon-hoc/index.php";
            return view('admin.mon-hoc.index', [
                'h1' => $h1,
                'subjects' => $subjects,
                'user' => $user,
            ]);
        }

        public function saveAdd(){
            if(isset($_POST['add'])){
                $model = new Subject();
                $data = [
                    'name' => $_POST['name'],
                    'author_id' => $_POST['author_id'],
                ];
                $model->insert($data);
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }
        }


        public function cap_nhat($id){
            $model = Subject::where('id', '=', $id)->first();
            if(!$model){
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }

            return view('admin.mon-hoc.update', [
                'model' => $model,
            ]);
        }

        public function luu_cap_nhat($id){
            // $model = Subject::where('id', '=', $id)->first();
            $model = Subject::find($id);
            if(!$model){
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }
            $model->name = $_POST['name'];
            $model->author_id = $_POST['author_id'];
            $model->save();
            
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        public function remove($id){
            Subject::destroy($id);
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }
    }

?>