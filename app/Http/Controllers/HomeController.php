<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view_order = Order::latest()->where('id_user', '=', Auth::user()->id)->get();
        $view_product = Product::latest()->limit(5)->get();
        $count_product = Product::where('total_product', '<', 100)->count();
        return view('home', compact('view_order', 'view_product', 'count_product'));
    }
}
