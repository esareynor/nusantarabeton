<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $view_user = User::paginate(5);
        return view('admin.user', compact('view_user'));
    }

    public function add_user_view()
    {
        return view('admin/add_user');
    }
    public function edit_user_view($id)
    {
        $edit_user_view = User::where('id', $id)->get();
        return view('admin/edit_user', compact('edit_user_view'));
    }
    public function edit_user_save(Request $request)
    {
        $password = $request->password;

        if (empty($password)) {
            User::where('id', $request->id)->update([
                'name' => $request['name'],
                'role' => $request['otoritas'],
                'phone' => $request->phone,
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($password == true) {
            User::where('id', $request->id)->update([
                'password' => Hash::make($request['password']),
                'name' => $request['name'],
                'role' => $request['otoritas'],
                'phone' => $request->phone,
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect('pengguna');
    }
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'otoritas' => ['required'],

        ]);
    }
    protected function add_user(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => 0,
            'role' => $request['otoritas'],
        ]);

        return redirect('pengguna');
    }
}
