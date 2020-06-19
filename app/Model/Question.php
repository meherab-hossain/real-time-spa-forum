<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   protected static function boot(){
       parent::boot();
       static::creating(function ($question){
           $question->slug = str_slug($question->title);
       });
   }
   public function getRouteKeyName()
   {
       return 'slug';
   }
    //one way to fill
     protected $fillable=['title','slug','body','category_id','user_id'];

    //another way to fill
    //protected $guarded=[];
	protected $with=['replies'];

    public function user(){
       return $this->belongsTo(User::class);
   }
   public function replies(){
       return $this->hasMany(Reply::class);
   }
   public function category(){
       return $this->belongsTo(Category::class);
   }

   public function getPathAttribute()
   {
       return "/question/$this->slug";
   }
}
