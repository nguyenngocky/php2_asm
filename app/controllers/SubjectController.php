<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;

if(isset($_SESSION['auth'])){
    class SubjectController{
        
        public function index(){
            $title = "Danh sách môn học";
            $h1 = "Danh sách môn học";
            $subjects = Subject::all();
            $user = User::all();

            include_once "./app/views/mon-hoc/index.php";
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


        public function cap_nhat(){
            $id = $_GET['id'];
            $title = "Sửa môn học";
            $model = Subject::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }
            include_once "./app/views/mon-hoc/update.php";
        }

        public function luu_cap_nhat(){
            $id = $_GET['id'];
            $model = Subject::where(['id', '=', $id])->first();
            if(!$model){
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }
    
            $data = [
                'name' => $_POST['name'],
                'author_id' => $_POST['author_id'],
            ];
            $model->update($data);
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        public function remove(){
            $id = $_GET['id'];
            Subject::destroy($id);
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }
    }

}else{
    header('location: '. BASE_URL .'login');
}
?>