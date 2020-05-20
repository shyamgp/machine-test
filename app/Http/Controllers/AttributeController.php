<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Attribute;
use Carbon\Carbon;
class AttributeController extends Controller
{
    public function add()
    {
    	$product = Product::all();

    	return view('add-attribute',compact('product'));
    }

    public function store(Request $request)
    {
    	
    	 $request->validate([
	            'attribute'=>'required'
	           
	     ]);
    	 $data =[

    	 	'product_id' => $request->product_id,
    	 	'attribute_name' => $request->attribute,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 Attribute::insert($data);
    	 return back()->with('success','successfully inserted');
    }

    public function display(Request $request)
    {
        $category_id = $request->category;
        $category_list = Attribute::where('category_id',$category_id)->get();
        return $category_list;
    }
}
