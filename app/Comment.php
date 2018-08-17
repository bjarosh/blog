<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
      protected $fillable = ['body', 'article_id'];
    public function article()
    {
      // code...
      return $this->belongsTo(Article::class);
    }
}
