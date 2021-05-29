<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\WorkOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
        $view_order = Order::orderBy('status', 'ASC')->get();
        $view_user = User::get();
        return view('admin.order', compact('view_order', 'view_user'));
    }

    public function add_order(Request $request)
    {
        $name_product = Product::select('name_product')->where('id', '=', $request->id_product)->get();
        foreach ($name_product as $np) {
            Order::insert([
                'id_user' => Auth::user()->id,
                'id_product' => $request->id_product,
                'name_product' => $np['name_product'],
                'total_order' => $request->total_order,
                'customer' => $request->jenis . ' ' . '-' . ' ' . $request->customer,
                'date_delivery' => $request->date_delivery,
                'role' => Auth::user()->role,
                'status' => 1,
                'address_delivery' => $request->address_delivery,
            ]);
            return redirect('home');
        }
    }
    public function detail_pesanan($id)
    {
        $view_order_detail = Order::where('id', $id)->get();
        $view_user_detail = User::get();
        $view_product_detail = Product::get();
        return view('admin.detail_order', compact('view_order_detail', 'view_user_detail', 'view_product_detail'));
    }
    public function konfirmasi_pesanan(Request $request)
    {
        Order::where('id', $request->id)->update([
            'status' => 2,
        ]);
        WorkOrder::insert([
            'id_order' => $request->id,
            'id_pic' => Auth::user()->id,
            'status' => 2,
            'created_at' => Carbon::now()->toDateString(),
        ]);
        return redirect('pesanan');
    }
}
