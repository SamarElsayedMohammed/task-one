<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view("admin.signin");
    }

    public function login(AdminRequest $request){

   $credential = $request->only('email', 'password');
   
        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin.posts.index')->with(['success'=>'تم تسجيل الدخول بنجاح']);
        } else {
            return back()->withInput($request->only('email'))->with(['error'=>"يوجد خطا فى بيانات الدخولو يرجى المحاوله مره اخرى"]);
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')
                    ->with(['success'=>'تم تسجيل الخروج بنجاح']);
    }
   
}
