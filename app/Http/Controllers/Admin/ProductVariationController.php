<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductVariationModel;
use App\Traits\ImageManager;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $productVariation  =  ProductVariationModel::where('product_id',$id)->get();
    //    dd($productVariation );
       return view('Admin.Product.Variation.list',['productVariation'=>$productVariation,'product_id'=>$id ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Admin.Product.Variation.add',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
       $image = $this->uploads($request->file('image'),'product/variation/');
       ProductVariationModel::create([
        'product_id'=>$request->product_id,
        'name'=>$request->name,
        'description'=>$request->description,
        'quantity'=>$request->quantity,
        'price'=>$request->amount,
        'image'=>$image['filePath'],
       ]);
       return redirect()->route('list.variation',['product_id'=>$request->product_id])->with('message','Create variation successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productVariation =  ProductVariationModel::find($id);
        return view('Admin.Product.Variation.edit',['productVariation'=>$productVariation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product =  ProductVariationModel::find($id);
        $path = $product->image;
        if($request->hasFile('image')){
           $this->deleteImage($product->image);
           $image = $this->uploads($request->file('image'),'product/variation/');
           $path = $image['filePath'];
        }
        ProductVariationModel::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->amount,
            'image'=>$path,
           ]);
           return redirect()->route('list.variation',['product_id'=>$request->product_id])->with('message','Update product successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productVariation =  ProductVariationModel::find($id);
         $this->deleteImage($productVariation->image);
         $productVariation->delete();
         return redirect()->route('list.variation',['product_id'=>$productVariation->product_id])->with('message','Delete product successfully');
    }
}
