<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'tiny_about' => $this->tiny_about,
            'birthday' => $this->birthday,
            'country' => $this->country,
            'city' => $this->city,
            'sex' => $this->sex,
            'car' => $this->car,
            'lookfor' => $this->lookfor,
            'children' => $this->children,
            'marital' => $this->marital,
            'education' => $this->education,
        ];
    }
}
