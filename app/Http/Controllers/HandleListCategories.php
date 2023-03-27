<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\product_category;


class HandleListCategories extends Controller
{
    
    public function show(){
        $limit = 5;
        $data = DB::table('posts')->get()->count();
        $pagination = ceil($data / $limit);
        $dataPagination=DB::table('posts')->paginate($limit);
        $current_page = $dataPagination->firstItem();
        return view("admin\listCategories",['data'=>$dataPagination,'pagination'=>$pagination,'limit'=>$limit,'current_page'=>$current_page]);
    }

    public function store(Request $request){
        
    }   

}
