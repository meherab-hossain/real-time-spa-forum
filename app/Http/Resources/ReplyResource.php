<?php

namespace App\Http\Resources;


class ReplyResource extends Resource
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
            'reply'=>$this->body,
            'user'=>$this->user,
            'question_slug'=>$this->question,
            'like_count'=>$this->likes()->count(),
            'liked'=>!!$this->likes()->where('user_id', auth()->id())->count(),
            'created_at'=>$this->created_at->diffForHumans()
        ];
    }
}
