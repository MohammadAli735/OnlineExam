<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'exam_name'=>$this->exam_name,
            'subject'=>$this->subject,
            'duration'=>$this->duration,
            'question_no'=>$this->question_no,
            'mark'=>$this->mark,
            'instructor_name'=>$this->instructor_name,
            'co_instructor_name'=>$this->co_instructor_name,
            'room_no'=>$this->room_no,
            'credits'=>$this->credits,
            'state'=>$this->state,
            'questions'=>QuestionResource::collection($this->whenLoaded('questions'))

            

        ];
    }
}
