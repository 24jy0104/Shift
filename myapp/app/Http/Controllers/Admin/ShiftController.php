<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Shift;
use App\Models\Staff;

class ShiftController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->startOfMonth();
        $lastDay = $today->copy()->endOfMonth();
    
        // 1か月分の日付配列
        $dates = [];
        $currentDay = $today->copy();
        while ($currentDay->lte($lastDay)) {
            $dates[] = $currentDay->format('Y-m-d');
            $currentDay->addDay();
        }
    
        // 全バイト情報
        $staffs = Staff::all();
    
        // シフトを staff_id でグループ化
        $shifts = Shift::all()->groupBy('staff_id');
    
        return view('admin.shift.shiftList', compact('today', 'dates', 'staffs', 'shifts'));
    }

    public function submit(Request $request)
    {
        $today = Carbon::now();
        $shifts = json_decode($request->input('shifts'), true);
    
        return view('admin.shift.shiftcheck', compact('today', 'shifts'));
    }
}
