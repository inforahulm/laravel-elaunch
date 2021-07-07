<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'auth-type'=>$this->auth_type,
            'facebook_id'=>$this->facebook_id,
            'google_id'=>$this->google_id,
        ];
    }
}
