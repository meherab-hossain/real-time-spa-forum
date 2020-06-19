<?php

namespace App\Http\Resources;



class NotificationResource extends Resource
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
            'replyBy' => $this->data['replyBy'],
            'question' => $this->data['question'],
            'path' => $this->data['path'],
        ];
    }
}
