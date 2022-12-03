<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // date_default_timezone_set('Asia/Kabul');
        
        return [
            'exam_name'=>'laravel',
            'subject'=>'php',
            "duration"=>Carbon::now('Asia/Kabul')->hour()->addHour(),
            "question_no"=>10,
            "mark"=>100,
            "instructor_name"=>'ali',
            "co_instructor_name"=>'mohammad ',
            "room_no"=>10,
            "credits"=>4
        ];
    }
}
