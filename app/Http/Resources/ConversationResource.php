<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ConversationResource extends JsonResource
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
            'user_one' => new UserResource(User::find($this->user_one)),
            'user_two' => new UserResource(User::find($this->user_two)),
            'last_message' => Str::limit($this->messages->last()->body, 35),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
