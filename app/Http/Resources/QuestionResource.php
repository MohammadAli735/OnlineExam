<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            'question'=>$this->question,
            'ans1'=>$this->ans1,
            'ans2'=>$this->ans2,
            'ans3'=>$this->ans3,
            'ans4'=>$this->ans4,
        ];
    }
}
