<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            "exam_name" => ['required', 'string'],
            "subject" => ['required', 'string'],
            "duration" => ['required', 'string'],
            "question_no" => ['required', 'integer'],
            "mark" => ['required', 'integer'],
            "instructor_name" => ['required', 'string'],
            "co_instructor_name" => ['nullable', 'string'],
            "room_no" => ['nullable', 'integer'],
            "credits" => ['required', 'integer'],

        ];
    }
}
