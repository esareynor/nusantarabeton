<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PublicController extends Controller
{
    public function index()
    {
        $view_product_1 = Product::where('category_product', 1)->paginate(1);
        $view_product_2 = Product::where('category_product', 2)->paginate(1);
        $view_product_3 = Product::where('category_product', 3)->paginate(1);
        return view('index', compact('view_product_1', 'view_product_2', 'view_product_3'));
    }
    function fetch_product_1(Request $request)
    {
        if ($request->ajax()) {
            $view_product_1 = Product::where('category_product', 1)->paginate(1);
            return view('assets/product_data_1', compact('view_product_1'))->render();
        }
    }
    function fetch_product_2(Request $request)
    {
        if ($request->ajax()) {
            $view_product_2 = Product::where('category_product', 2)->paginate(1);
            return view('assets/product_data_2', compact('view_product_2'))->render();
        }
    }
    function fetch_product_3(Request $request)
    {
        if ($request->ajax()) {
            $view_product_3 = Product::where('category_product', 3)->paginate(1);
            return view('assets/product_data_3', compact('view_product_3'))->render();
        }
    }
}
