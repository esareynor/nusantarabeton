<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\WorkOrder;
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
        $view_workorder = WorkOrder::orderBy('id', 'DESC')->limit(10)->get();
        $view_order = Order::get();
        $view_user = User::get();
        $view_product = Product::latest()->limit(5)->get();
        $count_product = Product::where('total_product', '<', 100)->count();
        return view('home', compact('view_workorder', 'view_order', 'view_product', 'count_product', 'view_user'));
    }
}
