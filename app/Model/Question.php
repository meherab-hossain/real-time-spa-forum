<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id','title', 'slug', 'body','category_id','user_id',
    ];
}
