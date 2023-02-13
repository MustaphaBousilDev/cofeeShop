<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        #$trachCat=Category::onlyTrashed()->query();
        return view('admin.product.product',compact('products',$products));
    }
    public function add()
    {
        $categories=Category::all();
        return view('admin.product.product-add',compact('categories',$categories));
    }
    public function store(Request $request){
        
        $validatedData=$request->validate([
            'product' => 'required|min:4',
            'image'=> 'required|mimes:jpg,jpeg,png',
            'price'=> 'required',
            'description'=> 'required|min:10',
        ],
        [
            'product.required'=>'Please Input product Name',
            'description.required'=>'Please Input description product',
            'price.required'=>'Please Input price',
            
        ]
        );
        
        if($request->has('image')){
            $file=$request->image;
            $imagename =time().''.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imagename );
        }
        

        /*$name_generator=hexdec(uniqid()) . '.' .$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('images/brand/'. $name_generator);
        $last_img='images/brand/'.$name_generator;*/
        Product::insert([
            'product'=>$request->product,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagename,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('all.product')->with('success','product succesfly added');

    }
    public function destroy($id)
    {
        Product::destroy($id);
        return Redirect()->back()->with('success', 'Category Inserted Succesefly');
    }

    public function edit($id){
        $products=DB::table('products')->where('id',$id)->first();
        $categories=Category::all();
        return view('admin.product.product-edit',compact('products','categories'));
    }

    public function update(Request $request,$id){
        
        $validatedData=$request->validate([
            'product' => 'required|min:4',
            
            'price'=> 'required',
            'description'=> 'required|min:10',
        ],
        [
            'product.required'=>'Please Input product Name',
            'description.required'=>'Please Input description product',
            'price.required'=>'Please Input price',
            
        ]
        );
        
        $old_image=$request->old_image;
        if($request->has('image')){
            $file=$request->image;
            $imagename =time().''.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imagename );
            //unlink($old_image);
            //var_dump($imagename);
            //die;
            Product::find($id)->update([
                'product'=>$request->product,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imagename,
            ]);
        }else{
            Product::find($id)->update([
                'product'=>$request->product,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->old_image,
            ]);
            
            
        }
        return Redirect()->route('all.product')->with('success','product succesfly added');
        
        
    }
}
