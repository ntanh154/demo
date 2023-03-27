<?php

namespace App\Http\Controllers;

use App\Models\variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AriantController extends Controller
{
    public function index(){
        $limit = 5;
        $pagination = DB::table('variants')->paginate($limit);
        $data = DB::table('variants')->get()->count();
        $numberPage = ceil($data / $limit);
        return view('variant\variantList',['pagination'=>$pagination??[], 'currentPage'=>$pagination?$pagination->firstItem():0, 'limit'=>$limit, 'numberPage'=>$numberPage]);
        
    }

    public function create(){
        return view('variant\addVariant');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ],[
            'name.required'=>'Name field is require'
        ]);

        $data = [
            'name'=>$request['name']
        ];

        variant::create($data);
        Session::flash('addVariant', 'Task was successful!');
        return redirect(route('variant.list'));
    }
}
