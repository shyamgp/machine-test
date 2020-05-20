<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Attribute;
use App\Model\SpecificationFeatures;
use Carbon\Carbon;

class SpecificationController extends Controller
{
   public function add()
   {
   	$product = Product::all();
   	return view('add-feature-specification',compact('product'));
   }
   public function show(Request $request)
   {
       
        $attribute = Attribute::where('product_id',$request->product_id)->get();
        return $attribute;
   }

   public function store(Request $request)
   {

   	$request->validate([
	            'features'=>'required',
	            'specification' => 'required'
	           
	     ]);
    	 $data =[

    	 	'attribute_id' => $request->attribute,
    	 	'features' => $request->features,
    	 	'specification' => $request->specification,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 unset($request->product);
    	 SpecificationFeatures::insert($data);
    	 return back()->with('success','successfully inserted');
   }
}
