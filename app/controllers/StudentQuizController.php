<?php 

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use App\Models\Subject;

class StudentQuizController {
    public function index(){
        $subject = Subject::all();
        return view('client.index', [
            'subject' => $subject,
        ]);
    }

    public function ds_quiz($id){
        $subject = Subject::find($id);
        $quiz = Quiz::where('subject_id', $id)->get();
        return view('client.quiz.index', [
            'subject' => $subject,
            'quiz' => $quiz,
        ]);
    }

    public function log_out(){
        session_destroy();
        header('Location: '. BASE_URL . 'login');
    }

    public function lamQuiz($id)
    {
        $user = $_SESSION['sinhvien']['id'];
        $studentQuiz = StudentQuiz::where('student_id', $user)
                        ->where('quiz_id', $id)->first();

        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->get();
        return view('client.quiz.lam-bai', [
            'quiz' => $quiz,
            'questions' => $questions,
            'studentQuiz' => $studentQuiz
        ]);
    }

    public function ketQua($id)
    {
        $dsDapAnDaChon = $_POST;
        $diem = 0;
        $stdQuiz = new StudentQuiz();
        $stdQuiz->student_id = $_SESSION['sinhvien']['id'];
        $stdQuiz->quiz_id = $id;
        $stdQuiz->save();

        foreach ($dsDapAnDaChon as $question => $ans) {
            $questionId = ltrim($question, 'question_');
            $stQuizDetail = new StudentQuizDetail();
            $stQuizDetail->student_quiz_id = $stdQuiz->id;
            $stQuizDetail->question_id = $questionId;
            $stQuizDetail->answer_id = $ans;
            $stQuizDetail->save();
            $dapan = Answer::find($ans);
            if($dapan->is_correct == 1){
                $diem++;
            }
        }
        $tongDiem = round($diem*10/count($dsDapAnDaChon), 2);
        $stdQuiz->score = $tongDiem;
        $stdQuiz->save();
        echo "Điểm của bạn là: " . $stdQuiz->score;
    }
}

?>