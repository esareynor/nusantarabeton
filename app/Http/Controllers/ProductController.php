<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $view_product = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin/product', compact('view_product'));
    }

    public function add_product_view()
    {
        return view('admin/add_product');
    }

    public function add_product(Request $request)
    {
        DB::table('products')->insert([
            'name_product' => $request->name_product,
            'total_product' => 0,
            'weight_product' => 0,
            'color_product' => "-",
            'category_product' => "-",
            'size_product' => "-",

        ]);
        return redirect('product');
    }

    public function edit_product_view($id)
    {
        $edit_product_view = Product::where('id', $id)->get();
        return view('admin/edit_product', compact('edit_product_view'));
    }

    public function edit_product_save(Request $request)
    {
        $pic_product = $request->file('pic_product');
        $upload_target = 'img';
        $color_product = implode($request->color_product);

        if (empty($pic_product)) {
            DB::table('products')->where('id', $request->id)->update([
                'name_product' => $request->name_product,
                'category_product' => $request->category_product,
                'size_product' => $request->size_product,
                'weight_product' => $request->weight_product,
                'color_product' => $color_product,
            ]);
        } elseif ($pic_product == true) {
            $pic_product->move($upload_target, $pic_product->getClientOriginalName());
            DB::table('products')->where('id', $request->id)->update([
                'pic_product' => $upload_target . '/' . $pic_product->getClientOriginalName(),
                'name_product' => $request->name_product,
                'category_product' => $request->category_product,
                'size_product' => $request->size_product,
                'weight_product' => $request->weight_product,
                'color_product' => $color_product,
            ]);
        }
        return redirect('product');
    }
    public function delete_product($id)
    {
        Product::where('id', $id)->delete();
        return redirect('product');
    }
}
