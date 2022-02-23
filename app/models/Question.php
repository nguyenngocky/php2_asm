<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model{
    protected $table = 'questions';

    public $timestamps = false;

    public function getAnswers(){
        return Answer::where('question_id', '=', $this->id)->get();
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'question_id');
    }
}
?>