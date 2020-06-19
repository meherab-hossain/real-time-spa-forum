<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
class UserResource extends Resource
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
            'id'=>$this->id,
            'question'=>QuestionResource::collection($this->questions),
            'replies'=>ReplyResource::collection($this->replies),

        ];
    }
}
