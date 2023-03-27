<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $limit = 5;
        $pagination = DB::table('products')->paginate($limit);
        $data = DB::table('products')->get()->count();
        $numberPage = ceil($data / $limit);
        return view('products/product',['pagination'=>$pagination??[], 'currentPage'=>$pagination?$pagination->firstItem():0, 'limit'=>$limit, 'numberPage'=>$numberPage]);
    }
    public function create(){
        $dataCategory = DB::table('product_categories')->get();
        return view('products/addProduct', ['dataCategory'=>$dataCategory?$dataCategory->all():[]]);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'nameProduct'=>'required',
            'optionCategories'=>'required',
            'desc' => 'required',
            'price' => 'required',
            'quantity'=>'required',
            'variant'=>'required'
        ],[
            'nameProduct.required'=>'Name Product field is required',
            'optionCategories.required'=>'optionCategories field is required',
            'desc.required' => 'desc field is required',
            'price.required' => 'price field is required',
            'quantity.required'=>'quantity field is required',
            'variant.required'=>'variant field is required'
        ]);
        // dd($request->nameProduct);

        // $images = $request->file('images');
        // if($request->hasFile('images')){
        //     foreach($images as $image){
        //         $dateCreateImage = date_create();
        //         $time = date_format($dateCreateImage, 'YmdHis');
        //         $imageName = $time . '-' . $image->getClientOriginalName();
        //         $image->move(base_path() . '/uploads/file/', $imageName);
        //         $arr[] = $imageName;
        //     }


        //     // dd($arr);
        // }

        $dataProduct = [
            'name'=>$request->nameProduct,
            'product_category_id' => $request->optionCategories,
            'description'=>$request->desc,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>'0',
            'is_variant'=>$request->variant
        ];
        product::Create($dataProduct);
        Session::flash('addProduct','Add Product was successful');
        return redirect(route('product.list'));
    }
}
