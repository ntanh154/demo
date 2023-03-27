<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class handleDashboardController extends Controller
{
    public function show(){
        return view('admin\dashboard');
    }
    public function store()
    {

    }
    public function showList(){
        DB::table('')->get();
    }
}
