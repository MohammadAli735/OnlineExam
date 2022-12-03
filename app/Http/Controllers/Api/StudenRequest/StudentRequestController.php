<?php

namespace App\Http\Controllers\Api\StudenRequest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\StudentRequestResource;
use App\Models\StudentRequest;

class StudentRequestController extends Controller
{
    public function requests(){
        $students=StudentRequest::whereStatus('')->with('user')->get();
        return StudentRequestResource::collection($students);
    }
}
