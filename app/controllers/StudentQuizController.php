<?php 

namespace App\Controllers;

use App\Models\StudentQuiz;

class StudentQuizController {
    public function index(){
        include_once "./app/views/quiz/index.php";
    }
}

?>