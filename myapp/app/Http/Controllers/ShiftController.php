<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function showForm(Request $request){
        $login_id = $request->session()->get('login_id');

        if (!$login_id) {
            return redirect('/login')->with('error', 'ログインしてください');
        }

        $user = DB::table('customers')->where('register_id', $login_id)->first();

        return view('shift_form', compact('user'));
    }

    public function submitForm(Request $request){
        $id = $request->input('id');
        $date = $request->input('date');
        $time = $request->input('time');
        $note = $request->input('note');
        // 

        return view('shift_result', compact('id','date','time','note'));
    }
}
