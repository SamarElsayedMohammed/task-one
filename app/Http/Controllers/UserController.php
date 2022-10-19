<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    public function index(){

        $users=User::withcount('posts')->paginate(2000);
        return view('users.index',compact('users'));
    }

    public function create(){
      
        return view('users.create');
    }

    public function store(UserRequest $request){

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['created_at']=now();
        $data['updated_at']=now();

        User::insert($data);

        return redirect()->route('user.index')->with(['success'=>'user created successfully']);

    }

    public function edit($id){

        $user=User::find($id);
        return view('users.edit',compact('user'));

    }

    public function update($id,UserRequest $request){

       $user=User::find($id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->updated_at=now();
       $user->save();

       return redirect()->route('user.index')->with(['success'=>'user updated successfuly']);


    }

    public function delete($id){

        $user=User::find($id);
        $user->destroy($id);
        return redirect()->route('user.index')->with(['success'=>'user deleted successfuly']);
    }


}
