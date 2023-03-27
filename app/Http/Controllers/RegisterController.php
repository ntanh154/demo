<?php

namespace App\Http\Controllers;
use Spatie\FlareClient\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function create(Request $request)
    {
        
    }
    public function store(Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'fileToUpload'=>'required'
        ],[
            'name.required'=>'name field is required',
            'email.required'=>'email field is required',
            'password.required' => 'password field is required',
            'fileToUpload.required'=>'fileToUpload field is required',
        ]);

        $checkEmail = DB::table('users')->where('email',$validate['email'])->exists();
        if(!$checkEmail){
            $name = $validate['name'];
            $email = $validate['email'];
            $password = $validate['password'];
            $thumbnail = $validate['fileToUpload']->getClientOriginalName();
            User::create([
                'name'=> $name,
                'email' => $email,
                'password'=>$password,
                'thumbnail'=>$thumbnail
            ]);
            return view('signIn');
        }
        
    }
}
