<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        return view('/article/show',  ['article'=>$article]);
    }
    public function index()
    {
        if(request('tag'))
        {
            $articles= Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else{
            $articles= Article::latest()->get();
        }

        return view('/article/index',  ['articles'=> $articles]);
    }
    public function userArticles()
    {
        $articles= Article::where('user_id', Auth::user()->id)->get();
        //dd(Auth::user()->id);
        return view('/article/userArticles',  ['articles'=> $articles]);
    }

    public function create()
    {
        return view('/article/create', ['tags'=> Tag::all()]);
    }
    public function store()
    {
//        $validatedAttributes=request()->validate([
//            'title'=> 'required',
//            'excerpt'=> 'required',
//            'body' => 'required'
//        ]);
        //dump(request()->all());
        //        $article= new Article();
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();

        //Article::create($this->validateArticle()); // Same as previous 5 Lines(Also includes the validation).
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id= Auth::user()->id;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }
    public function edit(Article $article)
    {
        //$article= Article::find($id);
        return view('/article/edit', compact('article'));
        //return view('/article/edit', ['article'=>$article]); another way of same as previous line
    }
    public function update(Article $article)
    {
        //$validatedAttributes= $this->validateArticle();
        //$article= Article::find($id);
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();
        $article->update($this->validateArticle()); // Same as previous 5 Lines(Also includes the validation).

        return redirect($article->path());

    }

    /**
     * @return array
     */
    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'

        ]);
    }
}
