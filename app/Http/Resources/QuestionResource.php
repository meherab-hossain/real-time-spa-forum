<?php

namespace App\Http\Resources;



class QuestionResource extends Resource
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
            'title'=>$this->title,
            'path'=>$this->path,
            'replies' => $this->when($this->needToInclude($request, 'question.user'), function () {
                return  ReplyResource::collection($this->replies);
            }),
            'reply_count'=>$this->replies->count(),
            'body'=>$this->body,
            'user'=>$this->user->name,
            'user_id'=>$this->user->id,
            'slug'=>$this->slug,
            'created_at'=>$this->created_at->diffForHumans()
        ];
    }
}
