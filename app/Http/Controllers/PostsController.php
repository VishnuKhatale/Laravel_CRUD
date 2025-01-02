<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Users;


class PostsController extends Controller
{
    public function index(){
        // $posts = Users::with('posts')->get(); //relation function define kel tyach nav
        $posts = Posts::with('user')->get();
        return view('posts/posts_list',compact('posts'));
    }


    public function create_post(){
        $users = Users::all();
        return view('posts/add',compact('users'));
    }

    public function save_post(Request $request){

        $validated = $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        $post = new Posts();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->user_id = $validated['user_id'];
        $post->save();

        return redirect('Post/posts')->with('success','Data Inserted Successfully');

    }


    public function edit_post($id){
        $users = Users::all();
        $post = Posts::find($id);
        return view('posts/edit', compact('users', 'post'));
    }


    public function update_post(Request $request, $id)
    {

        $validated = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Posts::find($id);

        $post->user_id = $validated['user_id'];
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->save();

        return redirect('Post/posts')->with('success','Data Inserted Successfully');
    }



    public function delete_post($id){
        $post = Posts::find($id);
        $post->delete();
        return redirect('Post/posts')->with('success','Data Deleted Successfully');
    }


}
