<?php

namespace App\Http\Controllers;

use App\Models\Maps;
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
        // dd($user);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // Auth::loginUsingId($user->id);
                session()->put('auth', base64_encode( json_encode( ['id' => $user->id,'name' => $user->name,'is_admin' => $user->is_admin]  ) ));
                cookie()->make('auth', base64_encode( json_encode( ['id' => $user->id,'name' => $user->name,'is_admin' => $user->is_admin]  ) ));
                
                return redirect()->intended('profile');
            } else {
                return redirect()->back()->withErrors(['err' => 'Invalid password'])->withInput($request->only('email'));
            }
        } else {
            return redirect()->back()->withErrors(['err' => 'User not found'])->withInput($request->only('email'));;
        }

        return redirect()->back()->withErrors(['err' => 'Invalid credentials'])->withInput($request->only('email'));;
    }
    public function logout()
    {
        session()->forget('auth');
        // Auth::logout();
        return redirect('/');
    }

    public function profile(Request $request)
    {
        // dd($request);
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
    public function services()
    {
        $maps = Maps::all();
        return view('services', ['maps' => $maps]);
    }
}
