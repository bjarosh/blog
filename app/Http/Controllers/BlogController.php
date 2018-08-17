<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function category($slug) {
    $category = Category::where('slug', $slug)->first();
    return view('blog.category', [
      'category' => $category,
      'articles' => $category->articles()->where('published', 1)->paginate(12)
    ]);
  }
  public function article($id) {
    	return view('blog.article', [
    		'article' => Article::where('id', $id)->first()
    	]);
    }

}
