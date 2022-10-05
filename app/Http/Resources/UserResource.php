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
        $data = array('id'=>$this->id,'full_name' => $this->full_name,'phone'=>$this->phone);
        if($this->access_token != '')
        {
            $data['access_token'] = $this->access_token;
        }
        return $data;
    }
}
