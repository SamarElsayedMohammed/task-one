<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){

        $posts=Post::paginate(200);
        return view("admin.posts.index",compact('posts'));
    }

    public function create(){
        $users=User::all();
        return view('admin.posts.create',compact('users'));
    }
    public function store(PostRequest $request){
        // return $request;
                $data['name']=$request->name;
                $data['note']=$request->note;
                $data['user_id']=$request->user_id;
                $data['created_at']=now();
                $data['updated_at']=now();
        
                Post::insert($data);
                return redirect()->route('admin.posts.index')->with(['success'=>'تم الانشاء بنجاح']);
                
            }
        
            public function edit($id){
        
                $post=Post::find($id);
                return view('admin.posts.edit',compact('post'));
            }
        
            public function update($id,Request $request){
        
                $post=Post::find($id);
        
                $post->name=$request->name;
                $post->note=$request->note;
                $post->save();
                return redirect()->route('admin.posts.index')->with(['success'=>'تم التحديث بنجاح']);
            }
        
        
            public function delete($id){
        
                $post=Post::find($id);
                $post->destroy($id);
                return redirect()->route('admin.posts.index')->with(['success'=>'تم الحذف بنجاح']);
        
            }
            
        
        }
