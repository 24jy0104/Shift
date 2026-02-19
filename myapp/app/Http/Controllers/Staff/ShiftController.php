<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShiftController extends Controller
{
    public function index(){
        $today = Carbon::now();
        return view('staff.shift', [
            'today' => $today,
        ]);
    }
    


    public function submit(Request $request)
    {
        $today = Carbon::now();
        $shifts = json_decode($request->input('shifts'), true);
    
        return view('staff.shiftcheck', compact('today', 'shifts'));
    }
}
