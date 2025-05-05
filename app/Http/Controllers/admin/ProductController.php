<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    //This methods will show products page
    public function index(){
    $products = Product::with(['categories', 'subCategory'])
                ->orderBy('created_at','DESC')
                ->get();
    return view('products.list',[
        'products' => $products
    ]);
}

    
    //This methods will create products page
    public function create(){
        $categories = Category::all();
    $subcategories = SubCategory::all(); // if you want to load all; or filter dynamically if needed

    return view('products.create', compact('categories', 'subcategories'));

    }
    //This methods will store a products in db
   public function store(Request $request)
{
    $rules = [
        'name' => 'required|min:5',
        'sku' => 'required|min:3',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'sub_category_id' => 'nullable|exists:sub_categories,id',
    ];

    if ($request->hasFile('image')) {
        $rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    }

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->route('products.create')->withInput()->withErrors($validator);
    }

    // Insert product in DB
    $product = new Product();
    $product->name = $request->name;
    $product->sku = $request->sku;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->sub_category_id = $request->sub_category_id;
    $product->description = $request->description;
    $product->save();

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/product'), $imageName);

        // Update product with image name
        $product->image = $imageName;
        $product->save();
    }

    return redirect()->route('products.index')->with('success', 'Product added successfully.');
}

    //This methods will show edit products page
   public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
   $subcategories = SubCategory::where('category_id', $product->category_id)->get();
    return view('products.edit', compact('product', 'categories', 'subcategories'));
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
       $product->category_id = $request->category_id;
       $product->sub_category_id = $request->sub_category_id;  // if needed
       $product->description = $request->description;
       

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