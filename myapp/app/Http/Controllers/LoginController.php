<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


// $users = DB::select('SELECT * FROM users');

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {

        $id = $request->input('id');
        $pass = $request->input('password');

        $user = User::where('register_id', $id)->first();

        if ($user && Hash::check($pass, $user->password)) {

            $request->session()->put('login_id', $user->register_id);
            $request->session()->put('user_role', $user->role);
    
            // ★ 管理者
            if ($user->role === 'admin') {
                return redirect('/shift');
            }
    
            // ★ バイト
            return redirect('/customer_top');  
        }
    
        return redirect('/login')->with('error', 'IDかパスワードが違います');
    }

    public function register()
    {
        return view('registercustomer');
    }

    public function register_check(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');
        $pass = $request->input('pass');
        $rpass = $request->input('rpass');

        if ($pass !== $rpass) {
            return redirect('/registercustomer')->with('error', 'パスワードが一致しません');
        }
        return view('confirmNewCustomer', compact('name', 'id', 'pass'));
    }
    public function addCustomer(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'register_id' => $request->input('id'),
            'password' => bcrypt($request->input('pass')),
        ]);


        return redirect('/login')->with('success', '登録が完了しました！');
    }



}