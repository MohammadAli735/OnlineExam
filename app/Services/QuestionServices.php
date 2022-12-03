<?php

namespace App\Services;

use App\Models\ExamQuestion;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionServices{
    public function questionAns(){
        return DB::table('exams')
        ->join('exam_question','exam_question.exam_id','exams.id')
        ->join('questions','questions.id','exam_question.question_id')
        ->select('questions.correct_ans','questions.question')
        ->where('exams.state','=',1)
        ->get();
    }

    public function index(){
        return Question::paginate(50);
    }

    public function questionbox($exam){
        return Question::WhereNotIn('id',function($exam_question)use($exam){
            $exam_question->select('question_id')->from('exam_question')
            ->where('exam_id','=',$exam)
            ;
        })->paginate(50);
    }

    public function store($data){
        $examd_id=$data['exam_id'];
        unset($data['exam_id']);
        $question=Question::create($data);
        ExamQuestion::create(['exam_id'=>$examd_id,'question_id'=>$question->id]);
    }

    public function update($data,$question){
        $question->update($data);
    }
}