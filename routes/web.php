<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;


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

Route::get('/new', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome2');
});
Route::get('/about', function () {
    //$article= App\Models\Article::all();
    //$article= App\Models\Article::take(2)->get();
    return view('about', ['articles'=>App\Models\Article::take(2)->latest()->get()]);
});

Route::get('/posts/{p}', [PostsController::class,'show']);

//    $posts=['post1'=>'This is post 1 Successful', 'post2'=>'This is post 2 Successful'];

//    if(!array_key_exists($post,$posts))
//    {
//        abort(404,'NOT FOUND ANY PAGE');
//    }

//    return view('post', ['ps'=>$posts[$post]]);
//    //return view('post', ['ps'=>$posts[$post] ?? 'WRONG']);
//    //return "<br>Hello From Vuut";


Route::get('/articles/create', [ArticlesController::class, 'create'])->middleware('auth');
Route::get('/articles', [ArticlesController::class,'index'])->name('articles.index');
Route::get('/userArticles', [ArticlesController::class,'userArticles'])->name('articles.userArticles');
Route::post('/articles', [ArticlesController::class,'store']);
Route::put('/articles/{article}', [ArticlesController::class,'update']);
Route::get('/articles/{article}/edit', [ArticlesController::class,'edit'])->name('articles.edit')->middleware('auth');
Route::get('/articles/{article}', [ArticlesController::class,'show'])->name('articles.show');


Route::get('/test', function () {
    $name= request('name');
    return view('test', ['nm'=> $name]);
});
Route::get('/contact', function () {
    return view('contact');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
