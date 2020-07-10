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
