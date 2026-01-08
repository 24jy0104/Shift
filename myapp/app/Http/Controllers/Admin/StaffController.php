<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    // 登録画面表示
    public function create()
    {
        return view('admin.staff.registStaff');
    }

    // 登録処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'register_number' => 'required|unique:staff,register_number',
                'name' => 'required',
                'password' => 'required|min:4',
                'work_type' => 'required|in:morning,night,both',
                'email' => 'required|email',
            ],
            [
                'register_number.unique' => 'このレジ番号はすでに登録されています',
            ]
        );


        // 保存
        Staff::create([
            'register_number' => $request->register_number,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'work_type' => $request->work_type,
            'email' => $request->email,
        ]);


        // 管理者メニューへ
        return redirect('/admin/menu');
    }

    // スタッフ一覧表示
    public function index()
    {
        $staffs = Staff::all();
        return view('admin.staff.staffList', compact('staffs'));
    }

    // 編集画面表示
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.updateStaff', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'register_number' => 'required|unique:staff,register_number,' . $id,
            'name' => 'required',
            'work_type' => 'required|in:morning,night,both',
            'email' => 'required|email',
        ]);

        $staff = Staff::findOrFail($id);

        $staff->update([
            'register_number' => $request->register_number,
            'name' => $request->name,
            'work_type' => $request->work_type,
            'email' => $request->email,
        ]);

        return redirect('/admin/staff');
    }

}

