<?php
namespace App\Controllers;
use App\Models\user;

if(isset($_SESSION['auth'])){header('location: '. BASE_URL .'dashboard');}

class LoginController{
    public function index(){
        
        include_once "./app/views/auth/sign-in.php";
    }
    public function check(){
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
            $user = User::where(['email', '=', $data['email']])->first(); // kiểm tra email lấy từ input có giống với email trong bảng không
            if($user && password_verify($data['password'], $user->password)){ // kiểm tra mật khẩu lấy từ input giống với mật khẩu trong bảng không
                if($user->role_id == 2){ // kiểm tra nếu role_id = 2 là giáo viên sẽ chuyển qua trang quản trị
                    header('Location: '. BASE_URL . 'dashboard');
                    unset($user->password); // xóa mật khẩu để bảo mật 
                    $_SESSION['auth'] = $user;
                    $_SESSION['id'] = $user->id;
                    $_SESSION['name'] = $user->name;
                    $_SESSION['email'] = $user->email;
                }else if($user->role_id == 1){ // role_id = 1 là sinh viên chuyển qua trang làm bài
                    header('Location: '. BASE_URL . 'quiz');
                    unset($user->password); // xóa mật khẩu để bảo mật . Đoạn này học thầy Thiện từ php1.
                    $_SESSION['auth_sv'] = $user;
                    $_SESSION['id_sv'] = $user->id;
                    $_SESSION['name_sv'] = $user->name;
                    $_SESSION['email_sv'] = $user->email;
                }
            }else{
                $thongbao = '<script>alert("đăng nhập thất bại")</script>';
                echo $thongbao;
                header('Location: '. BASE_URL . 'login');
            }
    }

    public function log_out(){
        if(isset($_SESSION['auth']) || isset($_SESSION['auth_sv'])){
            // unset($_SESSION['auth']);
            session_destroy();
            header('location: ' . BASE_URL . 'login');
        }
    }

    public function sign_up(){
        include_once "./app/views/auth/sign-up.php";
    }

    public function luu_sign_up(){
        $model = new user();
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $role_id = 1;
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $passwordHash,
            'role_id' => $role_id,
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'login');
        die;
    }

}
?>