<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;

class DashboardController extends Controller
{
    //DashboardController
    public function dashboard(){
      return view('admin.dashboard',[
        'count_categories'=> Category::count(),
        'count_articles'=> Article::count()
      ]);
    }
}
