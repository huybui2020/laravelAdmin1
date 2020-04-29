<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $catespost = Category::with('posts')->where('active', true)->groupBy('id')->get();
        return view('home');
    }
    public function welcome()
    {
        $catespost = Category::with('posts')->where('cate_active', true)->groupBy('id')->get();
        // dd($catespost);
        return view('welcome', compact('catespost'));
    }
}
