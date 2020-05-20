<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function add()
    {
    	return view('add-category');
    }

    public function store(Request $request)
    {
    	
    	 $request->validate([
	            'category'=>'required'
	           
	     ]);
    	 $data =[

    	 	'category_name' => $request->category,
    	 	'created_at' => Carbon::now(),
    	 ];
    	 Category::insert($data);
    	 return back()->with('success','successfully inserted');
    }
}
