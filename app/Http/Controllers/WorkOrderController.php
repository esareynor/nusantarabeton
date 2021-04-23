<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkOrderController extends Controller
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
        $view_order = Order::get();
        $view_user = User::get();
        $view_workorder = WorkOrder::orderBy('id', 'DESC')->get();
        return view('admin.workorder', compact('view_order', 'view_user', 'view_workorder'));
    }
    public function add_workorder_view()
    {
        $product_1 = Product::where('category_product', 1)->get();
        $product_2 = Product::where('category_product', 2)->get();
        $product_3 = Product::where('category_product', 3)->get();
        return view('admin.add_workorder', compact('product_1', 'product_2', 'product_3'));
    }
    public function add_workorder(Request $request)
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
                'address_delivery' => $request->address_delivery,
                'status' => 1,
                'created_at' => Carbon::now()->toDateString(),
            ]);
            return redirect('workorder');
        }
    }
    public function detail_workorder_view($id)
    {
        $view_order_detail = Order::where('id', $id)->get();
        $view_user_detail = User::get();
        $view_product_detail = Product::get();
        return view('admin.detail_workorder', compact('view_order_detail', 'view_user_detail', 'view_product_detail'));
    }
    public function detail_workorder_view_2($id)
    {
        $view_order_detail = Order::where('id', $id)->get();
        $view_user_detail = User::get();
        $view_product_detail = Product::get();
        return view('admin.detail_workorder', compact('view_order_detail', 'view_user_detail', 'view_product_detail'));
    }
}
