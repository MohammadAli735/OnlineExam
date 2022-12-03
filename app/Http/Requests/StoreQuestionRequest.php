<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "question" => ['required', 'string'],
            "ans1" => ['required'],
            "ans2" => ['required'],
            "ans3" => ['required'],
            "ans4" => ['required'],
            "correct_ans" => ['required'],
            "exam_id"=>['required','exists:exams,id']
        ];
    }
}
