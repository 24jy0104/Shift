<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ShiftController extends Controller
{
    public function index()
    {
        $today = Carbon::now();

        return view('admin.shift.shift', [
            'today' => $today,
        ]);
    }
}

