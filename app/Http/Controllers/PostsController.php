<?php


namespace App\Http\Controllers;
use App\Models\Post;

class PostsController
{
    public function show($slug)
    {
        //$posts=['post1'=>'This is post 1 Successful', 'post2'=>'This is post 2 Successful'];
//        $post= \DB::table('ages')->where('name',$slug)->firstOrFail();

        //dd($post);
//        if(!array_key_exists($post,$posts))
//        {
//            abort(404,'NOT FOUND ANY PAGE');
//        }
//        if(!$post)
//        {
//            abort(404);
//        }
        $post= Post::where('name',$slug)->firstOrFail();
        return view('post', ['ps'=>$post]);
        //return view('post', ['ps'=>$posts[$post] ?? 'WRONG']);
        //return "<br>Hello From Vuut";
    }
}
