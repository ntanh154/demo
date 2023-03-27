<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_variant;
use App\Models\product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductVariantController extends Controller
{
    public function index(){
        $limit = 5;
        $pagination = DB::table('product_variants')->paginate($limit);
        $data = DB::table('product_variants')->get()->count();
        $numberPage = ceil($data / $limit);
        return view('productVariant/productVariantList',['pagination'=>$pagination??[], 'currentPage'=>$pagination?$pagination->firstItem():0, 'limit'=>$limit, 'numberPage'=>$numberPage]);
    }

    public function create(Request $request)
    {
        $idProduct = $request->id;
        $dataProductVariant = product::find($idProduct)->productVariant;
        $OnlyProduct = DB::table('products')->where('id',$idProduct)->first();
        $dataVariant = DB::table('variants')->get();
        
        if(!empty($dataProductVariant)){
            return view('productVariant/addProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant,'dataProductVariant'=>$dataProductVariant]);
        }else{
            return view('productVariant/addProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant]);
        }
        
    }
    // public function create(Request $request)
    // {
    //     $idProduct = $request->id;
    //     $dataProductVariant = product::find($idProduct)->productVariant;
    //     $OnlyProduct = DB::table('products')->where('id',$idProduct)->first();
    //     $dataVariant = DB::table('variants')->get();
        
    //     if(!empty($dataProductVariant)){
    //         return view('productVariant/addProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant,'dataProductVariant'=>$dataProductVariant]);
    //     }else{
    //         return view('productVariant/addProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant]);
    //     }
        
    // }

    public function edit(Request $request){
        
        $idProduct = $request->id;
        $dataProductVariant = product_variant::find($idProduct);
        
        $OnlyProduct = DB::table('products')->where('id',$dataProductVariant->getAttributes()['product_id'])->first();
        $dataVariant = DB::table('variants')->get();
        if(!empty($dataProductVariant)){
            return view('productVariant/editProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant,'dataProductVariant'=>$dataProductVariant]);
        }else{
            return view('productVariant/editProductVariant',['OnlyProduct'=>$OnlyProduct,'dataVariant'=>$dataVariant]);
        }
    }
    public function update(Request $request){
        $id = $request->idProductVariant;
        $data=[
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'name'=>$request->nameProductVariant,
            'value'=>$request->valueVariant,
            'variant_id'=>$request->variant_id
        ];
        DB::table('product_variants')->where('id',$id)->update($data);

        return redirect(route('productVariant.list'));
        // $news->email = $request->email;
        // $news->description = $request->description;

        // $news->save();
    }
    public function store(Request $request){
        if($request->price !== null && isset($request->price)){
            $request->validate([
                'price'=>'required',
                'quantity'=>'required',
                'status'=>'required',
                'product_id'=>'required',
                'variant_id'=>'required',
                'images'=>'required',
                'nameProductVariant'=>'required',
                'valueVariant'=>'required'
            ]);
            dd($request->all());
            $data = [
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'status'=>$request->status,
                'name'=>$request->nameProductVariant,
                'value'=>$request->valueVariant,
                'product_id'=>$request->product_id,
                'variant_id'=>$request->variant_id,

            ];
            dd($data);
            $multiImage = implode('|', $request->images);
            $dataProductImage= [
                'path'=> $multiImage,
                'product_id'=>$request->product_id
            ];
            product_image::create($dataProductImage);
            product_variant::create($data);
            Session::flash('addProductVariant','Add Product Variant was successful');
            return redirect(route('product.list'));
            // product_variant::create($data);
            // Session::flash('addProductVariant','Add Product Variant was successful');
        }else{
            $request->validate([
                'product_id'=>'required',
                'images'=>'required'
            ]);
            $multiImage = implode('|', $request->images);
            $dataProductImage= [
                'path'=> $multiImage,
                'product_id'=>$request->product_id
            ];
            product_image::create($dataProductImage);
            Session::flash('addProductVariant','Add Product Variant was successful');
            return redirect(route('product.list'));
        }
        
        
        
        
    }
}
