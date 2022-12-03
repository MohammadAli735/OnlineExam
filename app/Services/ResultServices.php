<?php

namespace App\Services;

use App\Models\Exam;
use App\Models\Result;

class ResultServices
{
    public function index($request)
    {
        $results = Result::with(['user', 'exam'])
            ->when($request->search, function ($result) use ($request) {
                $result->whereHas('exam', function ($exam) use ($request) {
                    $exam->where('exam_name', 'like', "%{$request->search}%")
                        ->orWhere('subject', 'like', "%{$request->search}%");
                });
            })->orWhereHas('user', function ($user) use ($request) {
                $user->where('name', 'like', "%{$request->search}%")
                    ->orWhere('last_name', 'like', "%{$request->search}%")
                    ->orWhere('phone_no', 'like', "%{$request->search}%");
            })->latest('id')->get();
        $exams = Exam::whereIn('id', function ($examQuestion) {
            $examQuestion->select('exam_id')->from('exam_question');
        })->get(['id', 'exam_name']);

        return ['results'=>$results,'exams'=>$exams];
    }

    public function store($data){
        $exam = Exam::whereState(1)->first();
        $exam->results()->create($data);
    }
}
