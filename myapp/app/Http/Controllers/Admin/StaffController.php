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
        $request->validate(
            [
                'register_number' => 'required|unique:staffs,register_number',
                'name' => 'required',
                'password' => 'required|min:4',
                'work_type' => 'required|in:morning,night,both',
                'email' => 'required|email|unique:staffs,email',
            ],
            [
                'register_number.required' => 'レジ番号は必須です',
                'register_number.unique'   => 'このレジ番号はすでに登録されています',
                'name.required'            => '名前は必須です',
                'password.required'        => 'パスワードは必須です',
                'password.min'             => 'パスワードは4文字以上で入力してください',
                'work_type.required'       => '勤務区分を選択してください',
                'email.required'           => 'メールアドレスは必須です',
                'email.email'              => '正しいメールアドレス形式で入力してください',
                'email.unique'             => 'このメールアドレスはすでに登録されています',
            ]
        );

        Staff::create([
            'register_number' => $request->register_number,
            'name'            => $request->name,
            'password'        => Hash::make($request->password),
            'work_type'       => $request->work_type,
            'email'           => $request->email,
        ]);

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

    // 更新処理
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'register_number' => 'required|unique:staffs,register_number,' . $id,
                'name' => 'required',
                'work_type' => 'required|in:morning,night,both',
                'email' => 'required|email|unique:staffs,email,' . $id,
            ]
        );

        $staff = Staff::findOrFail($id);

        $staff->update([
            'register_number' => $request->register_number,
            'name'            => $request->name,
            'work_type'       => $request->work_type,
            'email'           => $request->email,
        ]);

        return redirect('/admin/staff');
    }
}
