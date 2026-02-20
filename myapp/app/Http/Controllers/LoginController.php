<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;


// $users = DB::select('SELECT * FROM users');

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function loginCheck(Request $request)
    {
        $request->validate([
            'register_number' => 'required',
            'password' => 'required',
        ]);

        // 管理者チェック
        // $admin = User::where('register_no', $request->register_no)->first();
        // 管理者チェック
        if ($request->register_number == 99999 && $request->password === '9999') {
            session(['role' => 'admin']);
            return redirect('/admin/menu');
        }

        // バイトチェック
        $staff = Staff::where('register_number', $request->register_number)->first();

        if ($staff && Hash::check($request->password, $staff->password)) {
            auth()->guard('staff')->login($staff);

            session(['staff_id' => $staff->id]);

            return redirect('/staff/menu');
        }

        return back()->withErrors([
            'login' => 'レジ番号またはパスワードが違います',
        ]);
    }
}