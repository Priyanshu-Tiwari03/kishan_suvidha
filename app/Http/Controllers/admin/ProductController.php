<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    //This methods will show products page
    public function index(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'products' =>$products
        ]);
    }
    //This methods will create products page
    public function create(){
        return view('products.create');
    }
    //This methods will store a products in db
    public function store(Request $request){
        $rules=[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'category' => 'required|string',    
        ];
        if($request->image != ""){
            $rules['image'] = 'image';
        }
       $validator = Validator::make($request->all(),$rules);

       if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
       }
       //here we  will insert product in db
       $product = new Product();
       $product->name = $request->name;
       $product->sku = $request->sku;
       $product->price = $request->price;
       $product->category = $request->category;
       $product->description = $request->description;
       $product->save();

       if($request->image != ""){
       //here we will store image
       $image = $request->image;
       $ext = $image->getClientOriginalExtension();
       $imageName = time().'.'.$ext; //unique image name

        //save image in product directory
        $image->move(public_path('uploads/product'),$imageName);

       //save image name in database
       $product->image = $imageName;
       $product->save();
    }
       
       return redirect()->route('products.index')->with('success','product added successfully.');
    }
    //This methods will show edit products page
    public function edit($id){
        $product =Product::findOrFail($id);
        return view('products.edit',[
             'product' => $product
        ]);
    }
    //This methods will update a products page
    public function update($id, Request $request){
        $product = Product::findOrFail($id);

        $rules=[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'category' => 'required|in:Seeds & Saplings,Fertilizers & Pesticides,Farming Tools & Equipment,Animal Husbandry & Dairy,Agro-Technology & Smart Farming',
            'description' => 'required|string'
        ];
        if($request->image != ""){
            $rules['image'] = 'image';
        }
       $validator = Validator::make($request->all(),$rules);

       if($validator->fails()){
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
       }
       //here we  will update product 
       
       $product->name = $request->name;
       $product->sku = $request->sku;
       $product->price = $request->price;
       $product->category = $request->category;
       $product->description = $request->description;
       $product->save();

       if($request->image != ""){
            //delete old image
            File::delete(public_path('uploads/product/'.$product->image)); 
        //here we will store image
       $image = $request->image;
       $ext = $image->getClientOriginalExtension();
       $imageName = time().'.'.$ext; //unique image name

        //save image in product directory
        $image->move(public_path('uploads/product'),$imageName);

       //save image name in database
       $product->image = $imageName;
       $product->save();
    }
       
       return redirect()->route('products.index')->with('success','product updated successfully.');
    
    }

    
    //This methods will detete products page
    public function destroy($id){
        $product = Product::findOrFail($id);

        //delete image
        File::delete(public_path('uploads/product/'. $product->image));

        //delete product from database
        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted successfully.');

    }
}