<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generalReport(){
        $totalStudent=User::whereRole(0)->count();
        $totalExam=Exam::count();
        $totalQuestion=Question::count();
        return response(
            [
                'totalStudent'=>$totalStudent,
                'totalQuestion'=>$totalQuestion,
                'totalExam'=>$totalExam,
            ]
        );
    }
    

    public function examReportByOfThisYear(Request $request){
        $year=$request->all();
        $examReport=DB::table('exams')
        ->selectRaw('MONTHNAME(created_at) as month , COUNT(id) as totalExam')
        ->whereYear('created_at',$year)
        ->groupByRaw('month')
        ->get();
        $examYears=DB::table('exam_question')
        ->selectRaw('year(created_at) as year ')
        ->groupByRaw('year')
        ->get();
        return response(
            [
                'examReport'=>$examReport,
                'examYears'=>$examYears
            ]
        );
    }

}
