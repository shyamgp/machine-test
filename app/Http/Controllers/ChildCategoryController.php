<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\ChildCategory;
use Carbon\Carbon;
class ChildCategoryController extends Controller
{
    public function add()
    {
    	$subcategory = SubCategory::all();

    	return view('add-child-category',compact('subcategory'));
    }

    public function store(Request $request)
    {
    	 $request->validate([
	            'child_category'=>'required'
	           
	     ]);
    	 $data =[

    	 	'subcategory_id' => $request->subcategory_id,
    	 	'child_category_name' => $request->child_category,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 ChildCategory::insert($data);
    	 return back()->with('success','successfully inserted');
    }

    public function display(Request $request)
    {
        $sub_category_id = $request->subcategory;
        $category_list = ChildCategory::where('subcategory_id',$sub_category_id)->get();
        return $category_list;
    }
}
