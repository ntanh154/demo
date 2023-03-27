<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandleHomeController extends Controller
{
    public function index(){
        $dataProduct = DB::table('products')->get();
            // join('product_images','products.id','=','product_images.product_id')
            // ->select('products.*','product_images.path')
            // ->get();
        // dd(explode('|',$dataProduct[0]->getAttributes()['path']));
        return view('main\home',['dataProduct'=>$dataProduct]);
    }
}
