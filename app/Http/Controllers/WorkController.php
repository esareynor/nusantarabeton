<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkController extends Controller
{
    public function index()
    {
        $view_order = Order::get();
        $view_user = User::get();
        $view_work = Work::orderBy('id', 'DESC')->get();
        return view('admin.work', compact('view_order', 'view_user', 'view_work'));
    }
    public function start_work(Request $request)
    {
        Work::insert([
            'id_pic' => Auth::user()->id,
            'id_order' => $request->id,
            'status' => 3,
            'created_at' => Carbon::now()->toDateString(),
        ]);
        Order::where('id', $request->id)->update([
            'status' => 3,
        ]);
        if (WorkOrder::where('id', $request->id) == true) {
            WorkOrder::where('id', $request->id)->update([
                'status' => 3,
            ]);
        }
        return redirect('work');
    }
}
