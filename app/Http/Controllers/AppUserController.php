<?php

namespace App\Http\Controllers;

use App\Models\AppUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppUserController extends Controller
{
    public function showLoginForm(){
        return view ('login');
    }

    public function login(Request $request){
        $request->validate([
            'user_id' => 'required',
            'user_password' => 'required'
        ]);
    
    
        $user = AppUserModel::where('user_id', $request->user_id)->first();
    

        if (!$user || !Hash::check($request->password, $user->user_password)) {
            return back()->withErrors(['error' => 'Invalid User ID or Password']);
        }

        
        Auth::login($user);
        return redirect('products.index');
        session(['user_id' => $user->user_id]);
    }



    public function showRegister(){
        return view('registration');
    }


    public function register(){
        $request->validate([
            'user_id' => 'required|unique:app-users,user_id',
            'user_lname' => 'required',
            'user_fname' => 'required',
            'user_password'=> 'required|min:8'
         
        ]);
    }
}
