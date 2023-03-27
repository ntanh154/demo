<?php

namespace App\Http\Controllers;
use App\Models\product_category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $limit = 5;
        $pagination = DB::table('product_categories')->paginate($limit);
        $data = DB::table('categories')->get()->count();
        $numberPage = ceil($data / $limit);
        return view('categories\category',['pagination'=>$pagination??[], 'currentPage'=>$pagination?$pagination->firstItem():0, 'limit'=>$limit, 'numberPage'=>$numberPage]);
    }

    public function create(){
        return view('categories\addCategory');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ],[
            'name.required'=>'Name field is required'
        ]);
        $data = [
            'name'=>$request->name
        ];
        product_category::Create($data);
        Session::flash('addCategory', 'Task was successful!');
        return redirect(route('category.list'));
    }
}
