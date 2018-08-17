<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    //
    public function store(Article $article){

      Comment::create([
        'body' => request('body'),
        'article_id' => $article->id
      ]);
      // $article->addComment(request('body'));

      return Redirect::back()->with('error_code', 5);
    }
}
