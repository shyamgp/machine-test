<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        $category = Category::all();
        return view('nested-category',compact('category'));
    }
}
