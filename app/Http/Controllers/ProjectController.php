<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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
        $view_project = Project::orderBy('id', 'DESC')->paginate(10);
        return view('admin/project', compact('view_project'));
    }

    public function add_project_view()
    {
        return view('admin/add_project');
    }

    public function edit_project_view($id)
    {
        $edit_project_view = Project::where('id', $id)->get();
        return view('admin/edit_project', compact('edit_project_view'));
    }

    public function add_project(Request $request)
    {
        $pic_project = $request->file('pic_project');
        $upload_target = 'img';

        if (empty($pic_project)) {
            DB::table('projects')->insert([
                'category_product' => $request->category_product,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'created_at' => Carbon::now(),
            ]);
        } elseif ($pic_project == true) {
            $pic_project->move($upload_target, $pic_project->getClientOriginalName());
            DB::table('projects')->insert([
                'pic_project' => $upload_target . '/' . $pic_project->getClientOriginalName(),
                'category_product' => $request->category_product,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('project');
    }
    public function edit_project_save(Request $request)
    {
        $pic_project = $request->file('pic_project');
        $upload_target = 'img';

        if (empty($pic_project)) {
            DB::table('projects')->where('id', $request->id)->update([
                'category_product' => $request->category_product,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'created_at' => Carbon::now(),
            ]);
        } elseif ($pic_project == true) {
            $pic_project->move($upload_target, $pic_project->getClientOriginalName());
            DB::table('projects')->where('id', $request->id)->update([
                'pic_project' => $upload_target . '/' . $pic_project->getClientOriginalName(),
                'category_product' => $request->category_product,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('project');
    }
    public function delete_project($id)
    {
        Project::where('id', $id)->delete();
        return redirect('project');
    }
}
