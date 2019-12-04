<?php

namespace App\Notifications;

use App\Http\Resources\ReplyResource;
use App\Model\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyNotification extends Notification
{
    use Queueable;

    public $reply;
    public function __construct(Reply $reply)
    {
        $this->reply=$reply;
    }

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'replyBy'=>$this->reply->user->name,
            'question'=>$this->reply->question->title,
            'path'=>$this->reply->question->path
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'replyBy'=>$this->reply->user->name,
            'question'=>$this->reply->question->title,
            'path'=>$this->reply->question->path,
            'reply'=>new ReplyResource($this->reply)
        ]);
    }
}
