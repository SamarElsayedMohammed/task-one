<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AdminRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
   
    public function index(){

        $users=Admin::latest()->where('id', '<>', auth()->id())->with('role')->paginate(10);
        return view('admin.admin_users.index',compact('users'));
    }

    public function create(){
        $roles = Role::get();
        return view('admin.admin_users.create',compact('roles'));
    }

    public function store(AdminRoleRequest $request){

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['role_id']=$request->role_id;
        $data['created_at']=now();
        $data['updated_at']=now();

        Admin::insert($data);

        return redirect()->route('admin.admin.users.index')->with(['success'=>'تم الانشاء بنجاح']);

    }

    public function edit($id){

        $user=Admin::find($id);
        $roles = Role::get();
        return view('admin.admin_users.edit',compact('user','roles'));

    }

    public function update($id,AdminRoleRequest $request){

       $user=Admin::find($id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->role_id=$request->role_id;
       $user->updated_at=now();
       $user->save();

       return redirect()->route('admin.admin.users.index')->with(['success'=>'تم التحديث بنجاح']);


    }

    public function delete($id){

        $user=Admin::find($id);
        $user->destroy($id);
        return redirect()->route('admin.admin.users.index')->with(['success'=>'تم الحذف بنجاح']);
    }


}
