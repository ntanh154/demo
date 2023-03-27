<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class validateFormController extends Controller
{
    public function show(){
        if(!empty(Session::get('name'))){
            return redirect('home');
        }
        return view('signIn');
    }
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required'=>'Email field is Require',
            'password.required'=>'Password field is Require',
            'email.email'=>'Email is not email'
        ]);

        $validated['password'] = md5($validated['password']);
        $numberUser = DB::table('users')->where(['email'=>$validated['email'],'password'=>$validated['password']])->count();
        if($numberUser > 0){
            Session::put('name', $validated['email']);
            return redirect('home');
        }
            
    }
}
