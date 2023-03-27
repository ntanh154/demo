<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;


class UserController extends Controller
{
    public function show()
    {
        $activity_user = Session::get('name')??'';
        if(!empty($activity_user))
        {
            $user=DB::table('users')->where('email', $activity_user)->first();
            $arrUser = ['email'=> $user->email];
            if(!empty($user)){
                return view('updateUser',['user'=> $arrUser]);  
            }
        }
        return view('home');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ],[
            'email.required'=> 'email field is required',
            'password.required'=> 'password field is required',
            'password_confirmation.required'=> 'rePassword field is required',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $email = $validated['email'];
        $password = $validated['password'];
        
        $check = DB::table('users')->where('email', $email)->exists();
        if(!$check){
            Session::flash('error_email','Tai khoan khong ton tai');
            return view('updateUser');
        }
        $passwordMD = md5($password);
        DB::table('users')
                ->update(['password' => $passwordMD]);
       
        return view('home');
    }
    
    public function update(Request $request, string $id)
    {
        
    }
}
