<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Traits\ImageManager;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product =  ProductModel::get();
       return view('Admin.Product.list',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::pluck('name','id')->toArray();
        return view('Admin.Product.add',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
       $image = $this->uploads($request->file('image'),'product/');
       ProductModel::create([
        'category_id'=>$request->category_id,
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$image['filePath'],
       ]);
       return redirect('product')->with('message','Create product successfully');

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
        $product =  ProductModel::find($id);
        $category = CategoryModel::pluck('name','id')->toArray();
        return view('Admin.Product.edit',['category'=>$category,'product'=>$product]);
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
        $product =  ProductModel::find($id);
        $path = $product->image;
        if($request->hasFile('image')){
           $this->deleteImage($product->image);
           $image = $this->uploads($request->file('image'),'product/');
           $path = $image['filePath'];
        }
        ProductModel::where('id',$id)->update([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$path,
           ]);
           return redirect('product')->with('message','Update product successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  ProductModel::find($id);
         $this->deleteImage($product->image);
         $product->delete();
         return redirect('product')->with('message','Delete product successfully');
    }
}
