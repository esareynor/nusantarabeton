<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\News;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
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
        $view_news = News::orderBy('id', 'DESC')->paginate(10);
        return view('admin/news', compact('view_news'));
    }

    public function add_news_view()
    {
        return view('admin/add_news');
    }

    public function edit_news_view($id)
    {
        $edit_news_view = News::where('id', $id)->get();
        return view('admin/edit_news', compact('edit_news_view'));
    }

    public function add_news(Request $request)
    {
        $pic_news = $request->file('pic_news');
        $upload_target = 'img';

        if (empty($pic_news)) {
            DB::table('news')->insert([
                'title_news' => $request->title_news,
                'paragraph_news' => $request->paragraph_news,
                'author' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        } elseif ($pic_news == true) {
            $pic_news->move($upload_target, $pic_news->getClientOriginalName());
            DB::table('news')->insert([
                'pic_news' => $upload_target . '/' . $pic_news->getClientOriginalName(),
                'title_news' => $request->title_news,
                'paragraph_news' => $request->paragraph_news,
                'author' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('news');
    }
    public function edit_news_save(Request $request)
    {
        $pic_project = $request->file('pic_news');
        $upload_target = 'img';

        if (empty($pic_project)) {
            DB::table('news')->where('id', $request->id)->update([
                'title_news' => $request->title_news,
                'paragraph_news' => $request->paragraph_news,
                'author' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        } elseif ($pic_project == true) {
            $pic_project->move($upload_target, $pic_project->getClientOriginalName());
            DB::table('news')->where('id', $request->id)->update([
                'pic_news' => $upload_target . '/' . $pic_project->getClientOriginalName(),
                'title_news' => $request->title_news,
                'paragraph_news' => $request->paragraph_news,
                'author' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('news');
    }
    public function delete_news($id)
    {
        News::where('id', $id)->delete();
        return redirect('news');
    }
}
