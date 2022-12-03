<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UserUpdateRequest extends FormRequest
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
            "name"=>['required','string','min:3'],
            "father_name"=>['required','string','min:3'],
            "last_name"=>['required','string','min:3'],
            "phone_no"=>['nullable','string','min:10','max:10','unique:users,phone_no,'.$this->user->id],
            "email"=>['required','email','unique:users,email,'.$this->user->id],
            'image'=>['nullable',File::types(['png','jpeg','jpg'])->max(5*1024)]
        ];
    }
}
