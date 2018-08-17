<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{id?}', 'BlogController@article')->name('article');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function(){
     Route::get('/', 'DashboardController@dashboard')->name('admin.index');
     Route::resource('/category', 'CategoryController', ['as'=>'admin']);
     Route::resource('/article', 'ArticleController', ['as'=>'admin']);

});

Route::get('/', function () {
    return view('blog.home');
});
Route::get('/about',[
  'uses'=> 'AboutController@create'

])->name('about');
Route::get('/contact', [
  'uses'=> 'ContactMessageController@create'

])->name('contact');

Route::post('/contact', [
  'uses' => 'ContactMessageController@store',
  'as '=> 'contact.store'

])->name('contact.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/blog/article/{article}/comments','CommentsController@store');
