<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showPage()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('admin/login');
        }
        return "Welcome";
    }
    public function login(Request $req)
    {
        // return $request->all();
        if (DB::table('users')->where('email', $req->email)->where('is_admin', true)->count('id')) {
            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials, $req->input('remember', false))) {
                // Authentication passed...
                return redirect()->intended('admin/dashboard');
            }
        }
        return redirect()->back()->withInput($req->only('email', 'remember'))->withErrors(['err' => 'Invalid credentials']);
    }
}
