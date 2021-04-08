<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        return view('home', compact('view_order'));
    }

    public function add_order(Request $request)
    {
        DB::table('orders')->insert([
            'id_user' => Auth::user()->id,
            'name_order' => $request->name_order,
            'total_order' => $request->total_order,
        ]);
        return redirect('home');
    }
}
