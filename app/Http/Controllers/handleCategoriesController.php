<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use GuzzleHttp\Promise\Create;

class handleCategoriesController extends Controller
{
    public function show(){
        return view('admin\categories');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title'=>'required',
            'parent_id'=>'required'
        ]);
        
        $checkCategory = DB::table('categories')->where('title',$validate['title'])->exists();
        if(!$checkCategory){
            Categories::Create([
                'title'=>$validate['title'],
                'parent_id'=>$validate['parent_id']
            ]);
            $request->flash('status','Created Categories successfuly');
            return view('admin\listCategories');
        }
    }
}
