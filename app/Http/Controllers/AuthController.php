<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showPage()
    {
        return view('login');
    }
    public function login(Request $request)
    {

        // fetch db with email having sql injection valn
        $user = User::whereRaw('email = "' . $request->email . '" ')->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::loginUsingId($user->id);
                return redirect()->intended('profile');
            } else {
                return redirect()->back()->withErrors(['err' => 'Invalid password']);
            }
        } else {
            return redirect()->back()->withErrors(['err' => 'User not found']);
        }

        return redirect()->back()->withErrors(['err' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile(Request $request)
    {
        $user = User::find($request->id);
        return view('profile', ['user' => $user]);
    }

    public function profileUpdate(Request $request)
    {
        if ($request->password) {
            $except = ['_token', 'id'];
        } else {
            $except =  ['_token', 'id', 'password'];
        }
        $updates = $request->except($except);
        $res = User::where('id', $request->id)->update($updates);
        if ($res) {
            return redirect()->to('/profile')->withErrors(['success' => 'Profile updated successfully']);
        }
        return redirect()->to('/profile')->withErrors(['err' => 'Somehting went wrong']);
    }
}
