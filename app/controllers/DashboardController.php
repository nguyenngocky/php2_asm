<?php
namespace App\Controllers;

if(isset($_SESSION['auth'])){
    class DashboardController{
        public function index(){
                include_once "./app/views/admin/index.php";
        }

        public function profile(){
            include_once "./app/views/admin/Auth/profile.php";
        }

    }

}else{
    header('location: '. BASE_URL .'login');
}

?>