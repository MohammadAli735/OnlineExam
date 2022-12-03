<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function studetRequests(){
        return $this->hasMany(StudentRequest::class);
    }
    public function questions(){
        return $this->belongsToMany(Question::class)->inRandomOrder();
        // return $this->belongsToMany(Question::class);
    }

    public function examQuestions(){
        return $this->hasMany(ExamQuestion::class);
    }

    public function results(){
        return $this->hasMany(Result::class);
    }
}
