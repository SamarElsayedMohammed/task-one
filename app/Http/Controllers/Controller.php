<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view("login");
    }

    public function login(Request $request){

   $credential = $request->only('email', 'password');
   
        if (Auth::guard('web')->attempt($credential)) {
            return redirect()->route('post.index')->with(['success'=>'تم تسجيل الدخول بنجاح']);
        } else {
            return back()->withInput($request->only('email'))->with(['error'=>"يوجد خطا فى بيانات الدخولو يرجى المحاوله مره اخرى"]);
        }

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('web.home')
                    ->with(['success'=>'تم تسجيل الخروج بنجاح']);
    }
   
}
