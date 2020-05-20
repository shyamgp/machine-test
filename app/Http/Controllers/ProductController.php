<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function add()
    {
    	return view('add-product');
    }
    public function store(Request $request)
    {
    	
    	 $request->validate([
	            'product'=>'required'
	           
	     ]);
    	 $data =[

    	 	'product_name' => $request->product,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 Product::insert($data);
    	 return back()->with('success','successfully inserted');
    }

    public function showProduct()
    {
      $products = Product::with(['attribute.specification'])->get(); 
      //dd($products[0]->attribute[0]->specification);
      return view('show-product',compact('products'));
    }
}
