<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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
            'achivedMark'=>$this->mark,
            'created_at'=>$this->created_at->diffForHumans(),
            'exam'=>new ExamResource($this->whenLoaded('exam')),
            'user'=>new UserResource($this->whenLoaded('user'))
        ];
    }
}
