<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;
use App\Models\Staff;



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


    //DBに登録処理
    public function insert(Request $request){
        

    $shiftsJson = $request->input('shifts');
    $shifts = json_decode($shiftsJson, true);
    
    // dd($shifts);
    $staffId = session('staff_id'); 
    if (!$staffId) {
        abort(403, 'ログイン情報がありません');
    }

    foreach ($shifts as $date => $value) {
        $data = [
            'staff_id' => $staffId,
            'date' => $date
        ];
    
        // ◎ または空欄は null にする
        if ($value === '◎' || $value === '') {
            $update = [
                'start_time' => null,
                'end_time' => null
            ];
        } else {
            // 時間が入っている場合は start_time にセット
            $update = [
                'start_time' => $value,
                'end_time' => null
            ];
        }
    
        Shift::updateOrCreate($data, $update);
    }
    

    // return redirect()->route('shift.index');
    return view('staff.menu');
}

    
}
