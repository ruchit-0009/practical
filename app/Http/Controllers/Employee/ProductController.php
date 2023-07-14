<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductVariationModel;
use App\Models\UserCartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list(){
        $product =  ProductModel::where('status',1)->get();
       return view('Employee.Product.list',['product'=>$product]);
    }
    public function details($product_id){
        $product =  ProductVariationModel::where(['product_id'=>$product_id,'status'=>1])->get();
       return view('Employee.Product.Variation.list',['productVariation'=>$product]);
    }
    public function addCart($id){
        $userId = Auth::user()->id;
        $product =  ProductVariationModel::where(['id'=>$id,'status'=>1])->first();

        if(isset($product->id) && $product->quantity > 0){
            UserCartModel::updateOrCreate([
                'employee_id'=>$userId,
                'product_id'=>$product->product_id,
                'product_variation_id'=>$product->id,
            ],[
                'employee_id'=>$userId,
                'product_id'=>$product->product_id,
                'product_variation_id'=>$product->id,
                'quantity'=>1,
            ]);
            return redirect()->route('product.details',['product_id'=>$product->product_id])->with('success','Add cart successfully'); 
        } else {
           return redirect()->route('product.details',['product_id'=>$product->product_id])->with('error','out of stock'); 
        }
    }
}
