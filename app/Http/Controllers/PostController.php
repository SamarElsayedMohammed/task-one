<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(){
        $posts =Post::paginate(25);
        return view('index',compact('posts'));

    }

    public function create(){
        $users=User::all();
        return view('create',compact('users'));
    }

    public function store(PostRequest $request){
// return $request;
        $data['name']=$request->name;
        $data['note']=$request->note;
        $data['user_id']=$request->user_id;
        $data['created_at']=now();
        $data['updated_at']=now();

        Post::insert($data);
        return redirect()->route('post.index')->with(['success'=>'post created successfully']);
        
    }

    public function edit($id){

        $post=Post::find($id);
        return view('edit',compact('post'));
    }

    public function update($id,Request $request){

        $post=Post::find($id);

        $post->name=$request->name;
        $post->note=$request->note;
        $post->save();
        return redirect()->route('post.index')->with(['success'=>'post update successfully']);
    }


    public function delete($id){

        $post=Post::find($id);
        $post->destroy($id);
        return redirect()->route('post.index')->with(['success'=>'post deleted successfully']);

    }
    

}