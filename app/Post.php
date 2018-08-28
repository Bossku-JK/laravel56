<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'summary', 'content','active','tag','name','category_id','showc'];

    protected $dates = ['created_at','brithday'];

    
    public function User()
{
    return $this->belongsTo(User::class);
}

public function tags()
  {
      return $this->belongsToMany('App\Tag');
  }

public function Category()
  {
      return $this->belongsTo('App\Category');
  }
}
