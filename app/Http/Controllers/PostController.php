<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index(){

        $posts = Post::all();

        return view('admin.posts.index', ['posts'=> $posts]);

    }


    public function show(Post $post){
        // dd($id);
        // Post::findOrFail($id);

        return view('blog-post', ['post'=> $post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    //public function store(Request $request){
    public function store(){
        // auth()->user();
        // dd(request()->all());

        $inputs = request()->validate([
            'title'=> 'required|min:8',
            'post_img'=> 'mimes:jpeg,png',
            'body'=> 'required'
        ]);

        if(request('post_img')){
            $inputs['post_img'] = request('post_img')->store('images');
        }

        // dd($request->post_img);
        // dd(input('post_img'));

        auth()->user()->posts()->create($inputs);

        return back();


    }
}
