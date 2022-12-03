<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ans1=$this->faker->sentence;
        $ans2=$this->faker->sentence;
        $ans3=$this->faker->sentence;
        $ans4=$this->faker->sentence;
        $correct_ans=$this->faker->randomElement([$ans1,$ans2,$ans3,$ans4]);
        return [
            "question"=>$this->faker->sentence,
            "ans1"=>$ans1,
            "ans2"=>$ans2,
            "ans3"=>$ans3,
            "ans4"=>$ans4,
            "correct_ans"=>$correct_ans
        ];
    }
}
