<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function examQuestion(){
        return $this->belongsTo(ExamQuestion::class);
    }

    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
