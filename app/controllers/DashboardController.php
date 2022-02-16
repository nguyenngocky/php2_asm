<?php
namespace App\Controllers;

    class DashboardController{
        public function index(){
            $title = "Trang chủ";
            include_once "./app/views/admin/index.php";
        }

        public function profile(){
            $title = "Trang thông tin cá nhân";
            include_once "./app/views/admin/Auth/profile.php";
        }

    }

?>