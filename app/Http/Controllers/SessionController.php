<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    protected $loginForm;
    public function __construct(LoginFormController $loginForm)
    {
        $this->loginForm = $loginForm;
    }
    public function store(){
    }
}
