<?php

namespace App\Services;

use App\Models\Exam;
use Illuminate\Support\Facades\DB;

class ExamServices
{
    public function index()
    {
        return Exam::latest('state')->paginate(1);
    }

    public function store($data)
    {
        return  $exam = Exam::create($data);
    }

    public function active($exam)
    {
        if ($exam->state === 1) {
            $exam->update(['state' => 0]);
        } else {

            Exam::where('id', '!=', $exam->id)
                ->update(
                    [
                        'state' => '0'
                    ]
                );
            $exam->update(['state' => 1]);
        }
    }

    public function startExam()
    {
        return Exam::with('questions')->whereState(1)->first();
    }

    public function qas()
    {
        return DB::table('exams')
            ->join('exam_question', 'exam_question.exam_id', 'exams.id')
            ->join('questions', 'questions.id', 'exam_question.question_id')
            ->select(
                'questions.question',
                'questions.ans1',
                'questions.ans2',
                'questions.ans3',
                'questions.ans4',
                'questions.correct_ans'
            )
            ->where('exams.state', '=', 1)
            ->get();
    }
}
