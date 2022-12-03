<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\StudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class Authcontroller extends Controller
{
    
    public function register(Request $request){
        $data=$request->validate(
            [
                'name'=>'required|string',
                'last_name'=>'required|string',
                'father_name'=>'required|string',
                'email'=>'required|email|string|unique:users,email',
                'phone_no'=>'required|string|max:10|unique:users,phone_no',
                
            ]
        );

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

    public function login(Request $request){
        $credentials=$request->validate(
            [
                'email'=>'required|email|string|exists:users,email',
                'password'=>'required'
            ]
        );
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

    public function LogOut(){
        $user=Auth::user();
        // return $user;
        $user->currentAccessToken()->delete();
        return response([
            'success'=>true
        ]);
    }
}
