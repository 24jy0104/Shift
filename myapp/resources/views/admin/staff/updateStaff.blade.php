{{-- resources/views/admin/staff/updateStaff.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>スタッフ編集</h1>

    <form method="POST" action="/admin/staff/{{ $staff->id }}/update">
        @csrf

        <div>
            <label>レジ番号</label><br>
            <input type="number" name="register_number" value="{{ $staff->register_number }}">
        </div>

        <br>

        <div>
            <label>名前</label><br>
            <input type="text" name="name" value="{{ $staff->name }}">
        </div>

        <br>

        <div>
            <label>勤務区分</label><br>
            <label>
                <input type="radio" name="work_type" value="morning" {{ $staff->work_type === 'morning' ? 'checked' : '' }}> 朝
            </label>
            <label>
                <input type="radio" name="work_type" value="night" {{ $staff->work_type === 'night' ? 'checked' : '' }}> 夜
            </label>
            <label>
                <input type="radio" name="work_type" value="both" {{ $staff->work_type === 'both' ? 'checked' : '' }}> 両方
            </label>
        </div>

        <br>

        <div>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="{{ $staff->email }}">
        </div>

        <br>

        <button type="submit">更新</button>
    </form>

    <br>
    <a href="/admin/staff">一覧に戻る</a>
@endsection