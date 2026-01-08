{{-- resources/views/admin/staff/registStaff.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>スタッフ新規登録</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/admin/staff/registStaff">
        @csrf

        <div>
            <label>レジ番号</label><br>
            <input type="number" name="register_number">
        </div>

        <br>

        <div>
            <label>名前</label><br>
            <input type="text" name="name">
        </div>

        <br>

        <div>
            <label>勤務区分</label><br>
            <label>
                <input type="radio" name="work_type" value="morning"> 朝
            </label>
            <label>
                <input type="radio" name="work_type" value="night"> 夜
            </label>
            <label>
                <input type="radio" name="work_type" value="both"> 両方
            </label>
        </div>

        <br>

        <div>
            <label>メールアドレス</label><br>
            <input type="email" name="email">
        </div>

        <div>
            <label>パスワード</label><br>
            <input type="password" name="password">
        </div>

        <br>

        <button type="submit">登録</button>
    </form>

    <br>

    <a href="/admin/menu">管理者メニューに戻る</a>
@endsection