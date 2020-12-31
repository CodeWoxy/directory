<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
    public function up(Request $r)
    {
        $a = array();
        $cc = Admin::where('email', $r->email)->get();
        if(!sizeof($cc)){
           $admin = Admin::create(['name' => $r->name, 'email' => $r->email, 'password' => Hash::make($r->password) ]);
            if($admin->save()){
                $a['success'] = "Admin created";
            }else{
                $a['error'] = "Admin not created!";
            }
        }else{
            $a['error'] = "Email already registered!";
        }

        return response()->json($a);
    }

    public function index(Request $r)
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin-profile',['user'=>Auth::guard('admin')->user()]);
        }else{
            return view('admin.login');
        }

    }

    public function login(Request $r)
    {
        $a = Admin::where('email', $r->email)->get();
        // dd($a);
        if(sizeof($a)){
            if(Auth::guard('admin')->attempt(['email' => $r->email, 'password' => $r->password])){
                return redirect()->route('admin-profile');
            }else{
                return redirect()->back()->with('error', "Email or password is not correct!");
            }

        }else{
            return redirect()->back()->with('error', "Email is not registered!");
        }
    }

    public function logout(Request $r)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/');
    }

    public function dashboard(Request $r)
    {
        return view('admin.profile', ['page' => 'admin-profile', 'user' => Auth::guard('admin')->user()]);
    }
}
