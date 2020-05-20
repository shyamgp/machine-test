<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
Use App\User;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function add()
    {
    	return view('user-details');
    }

    public function store(Request $request)
    {
    	$request->validate([
	        'name' => 'required| string| max:255',
            'email' => 'required |string| email| max:255| unique:users',
            'password' => 'required| string | min:8| confirmed',
	           
	     ]);
    	if ($request->hasFile('image')) {

            $ext = $request->image->getClientOriginalExtension();

            $path = Storage::putFileAs('user' , $request->image, time() . "." . $ext);


        }
        $data=[
        	'name' => $request->name,
        	'email' =>$request->name,
        	'password' =>Hash::make($request->name),
        	'created_at' =>Carbon::now(),
        	'image' => $path,
        ];
        User::insert($data);
        return back()->with('success','successfully inserted');
    }


}
