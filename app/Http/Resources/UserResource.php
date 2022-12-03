<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'lastname'=>$this->last_name,
            'fatherName'=>$this->father_name,
            'email'=>$this->email,
            "phone_no"=>$this->phone_no,
            "role"=>$this->role,
            'image'=>url($this->image??'upload/admin/image/admin.jpeg'),
        ];
    }
}
