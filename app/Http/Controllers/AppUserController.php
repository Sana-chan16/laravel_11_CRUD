<?php

namespace App\Http\Controllers;

use App\Models\AppUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AppUserController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required'
        ]);

        $user = AppUserModel::where('user_id', $request->user_id)->first();

        if (!$user || !Hash::check($request->password, $user->user_password)) {
            return back()->withErrors(['error' => 'Invalid User ID or Password']);
        }

        Auth::login($user);
        session(['user_id' => $user->user_id]);

        return redirect()->route('products.index');
    }


    public function showRegisterForm()
    {
        return view('registration');
    }


    
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:app-users,user_id',
            'user_fname' => 'required',
            'user_lname' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = AppUserModel::create([
            'user_id' => $request->user_id,
            'user_fname' => $request->user_fname,
            'user_lname' => $request->user_lname,
            'user_password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        session(['user_id' => $user->user_id]);

        return redirect()->route('register')->with('success', 'Successfully registered. Proceed to login.');
    }
}