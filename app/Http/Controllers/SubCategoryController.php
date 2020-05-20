<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\SubCategory;
use Carbon\Carbon;
class SubCategoryController extends Controller
{
    public function add()
    {
    	$category = Category::all();

    	return view('add-sub-category',compact('category'));
    }

    public function store(Request $request)
    {
    	
    	 $request->validate([
	            'subcategory'=>'required'
	           
	     ]);
    	 $data =[

    	 	'category_id' => $request->category,
    	 	'sub_category_name' => $request->subcategory,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 SubCategory::insert($data);
    	 return back()->with('success','successfully inserted');
    }

    public function display(Request $request)
    {
        $category_id = $request->category;
        $category_list = SubCategory::where('category_id',$category_id)->get();
        return $category_list;
    }
}
