<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

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

    public function edit(Post $post){

        //$posts = Post::findOrFail($post);

        return view('admin.posts.edit', ['post'=> $post]);

    }

    public function update(Post $post, Request $request){

        $inputs = $request->all();

        if($inputs['post_img']){
            $inputs['post_img'] = request('post_img')->store('images');
            $post->post_img = $inputs['post_img'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //auth()->user()->posts()->save($post);

        $post->save();
        //$post->update();

        session()->flash('message','Post is Updated');

        return redirect()->route('post.index');

    }

    //public function store(Request $request){
    public function store(Request $request){
        // auth()->user();
        // dd(request()->all());

        // $inputs = request()->validate([
        //     'title'=> 'required|min:8',
        //     //'post_img'=> 'mimes:jpeg,png',
        //     'post_img'=> 'file',
        //     'body'=> 'required'
        // ]);

        

        $inputs = $request->all();

        if($inputs['post_img']){
            $inputs['post_img'] = request('post_img')->store('images');
        }

        // dd($request->post_img);
        // dd(input('post_img'));

        auth()->user()->posts()->create($inputs);

        //return back();

        //Session::flash('post-created-message','New Post is Created');

        session()->flash('post-created-message','New Post is Created');

        return redirect()->route('post.index');


    }

    public function destroy(Post $post){

        $post->delete();

        //Session::flash('message','Post is deleted');

        session()->flash('message','Post is deleted');

        return back();

    }

    // public function destroy(Post $post, Request $request){

    //     $post->delete();

    //     $request->session()->flash('message','Post is deleted');

    //     return back();

    // }
    
}
