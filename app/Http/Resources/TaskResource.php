<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'details'=>$this->details,
            'user_info'=>optional($this->user_info)->full_name ?? null,
            'group_info'=>optional($this->group_info)->name ?? null,
            'image'=>$this->image ? asset($this->image) : null,

        ];
    }
}
