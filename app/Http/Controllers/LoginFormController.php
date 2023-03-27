<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginFormController extends Controller
{
    public function rules(){
        return [
            'email' => 'required|email',
            'password' => 'required|alpha',
        ];
    }
}
