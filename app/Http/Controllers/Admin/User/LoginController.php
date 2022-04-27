<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class LoginController extends Controller
{

    public function index()
    {
        return view ('admin.user.login',
        [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

   public function store(Request $request)
   {

      $this->validate($request,[
        'email'=>'required|email:filter',
         'password'=>'required',

      ]);

      if(Auth::attempt([
          'email'=> $request->input('email'),
          'password'=>$request->input('password')
      ],$request->input('remember'))){
        return redirect()-> route('admin');
   }
      Session::flash('error','Email and password faile');
      return redirect()->back();
   }

}
