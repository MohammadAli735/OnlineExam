<?php

namespace App\Services;

use App\Models\Exam;
use App\Models\StudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServices{
    public function register($data){
        $data['password']=bcrypt('password');
        $data['role']=0;
        $user=User::create($data);
        $token=$user->createToken('main')->plainTextToken;
        return response(
            [
                'user'=>$user,
                'token'=>$token
            ]
        );
    }
    public function login($credentials){
        return "here";
      
        if(!Auth::attempt($credentials)){
            return response([
                'message'=>'the credentials are not correct'
            ],422);
        }
        $user=Auth::user();
        // handle the student request for passing the exam
        if($user->role==="student"){
            $exam=Exam::whereState(0)->first();
            StudentRequest::create(
                [
                    'exam_id'=>$exam->id,
                    'user_id'=>$user->id
                 ]
            );
        }
        
        // 
        $token = $user->createToken('main')->plainTextToken;
        return response(
            [
                'user' => $user,
                'token' => $token
            ]
        );
    }
}