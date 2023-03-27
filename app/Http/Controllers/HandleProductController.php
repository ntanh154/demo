<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_image;
use App\Models\product_variant;
use App\Models\variant;
use Illuminate\Http\Request;

class HandleProductController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $variantId = $request->variant??5;
        $productVariantID = $request->productVariantID??product_image::where('product_id',$id)->get()->first()->product_variant_id;
        $countVariant = product_variant::where('product_id',$id)->count();
        $data = "";
        $IsVariant = false;
        $dataProduct="";
        $nameVariant = variant::select('variants.id','variants.name')->get();
        $arrayColorAriant = array();
        if($countVariant > 0){
            $IsVariant = true;
            $dataProduct = product::find($id);
            $colorVariant = product_variant::where('product_id',$id)->select('name','value', 'id')->get();
                foreach($colorVariant as $value){
                    array_push($arrayColorAriant, Array(
                        'name'=>$value->name,
                        'value'=>$value->value,
                        'variant_id'=>$value->id
                    ));
                }
            $data = product_variant::join('variants','product_variants.variant_id','=','variants.id')
                                    ->join('product_images', 'product_variants.id','=', 'product_images.product_variant_id')
                                    ->where('product_variants.product_id',$id)
                                    ->where('product_variants.variant_id',$variantId)
                                    ->where('product_images.product_id', $id)
                                    ->where('product_variants.id',$productVariantID)
                                    ->select('product_variants.*','product_variants.price','product_variants.variant_id','product_variants.quantity', 'variants.name', 'product_images.path','product_images.product_variant_id')
                                    ->get();

        }else{
            $data = product::
                            join('product_images',"products.id",'=','product_images.product_id')
                            ->where('product_images.product_id',$id)
                            ->select('products.*','product_images.path')
                            ->get();
            $IsVariant = false;
        }
        return view('products/productDetail', ['data'=>$data??[], 'IsVariant'=> $IsVariant,'NameVariant' => $nameVariant??[], 'dataProduct'=>$dataProduct, 'arrayColorAriant'=>$arrayColorAriant??[]]);
    }

   
}
