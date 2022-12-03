<?php

use App\Http\Controllers\Api\auth\Authcontroller;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudenRequest\StudentRequestController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(Authcontroller::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/is_active_exam','activeExam')->name('is.exam.active');
});
Route::post('/logout',[Authcontroller::class,'LogOut'])->name('logout')->middleware('auth:sanctum');
Route::controller(StudentRequestController::class)->group(function(){
    Route::get('/requests','requests')->name('student.requests');
});
Route::apiResource('/exams',ExamController::class)->middleware('auth:sanctum');
Route::put('/exams/{exam}/active',[ExamController::class,'active'])->name('exam.active')->middleware('auth:sanctum');
Route::get('/exam/question/answer/start',[ExamController::class,'startExam'])->name('exam.question.answer.start')->middleware('auth:sanctum');
Route::apiResource('/questions',QuestionController::class)->middleware('auth:sanctum');
Route::get('/add/from/questionBox/{exam}',[QuestionController::class,'questionbox']);
Route::post('/qdf/{question}',[QuestionController::class,'update'])->middleware('auth:sanctum');
Route::post('/questionAns',[QuestionController::class,'questionAns'])->name('questionAns')->middleware('auth:sanctum');
Route::post('/qas',[ExamController::class,'qas'])->name('qas')->middleware('auth:sanctum');
Route::apiResource('/results',ResultController::class)->middleware('auth:sanctum');
Route::post('/getResults',[ResultController::class,'index']);
Route::post('/exam/questions/{exam}',[ExamQuestionController::class,'store'])->name('exam.question.store')->middleware('auth:sanctum');

// reports router
Route::get('/generalReport',[ReportController::class,'generalReport'])
    ->name('generalReport')->middleware('auth:sanctum');
Route::post('/examReportByOfThisYear',[ReportController::class,'examReportByOfThisYear'])
    ->name('examReportByOfThisYear')->middleware('auth:sanctum');
// profile route

Route::get('/profile',[ProfileController::class,'profile'])->name('profile')->middleware('auth:sanctum');;
Route::put('/updateProfile/{user}',[ProfileController::class,'update'])->name('profile.update')->middleware('auth:sanctum');;
Route::put('/changePWD/{user}',[ProfileController::class,'changePWD'])->name('profile.changePWD')->middleware('auth:sanctum');;
