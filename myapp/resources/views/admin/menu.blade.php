<!-- resources/views/admin/menu.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>管理者メニュー</h1>

    <ul>
        <li><a href="/admin/staff/registStaff">スタッフ新規追加</a></li>
        <li><a href="/admin/staff">スタッフ一覧</a></li>
        <li><a href="/admin/shift">シフト管理</a></li>
    </ul>

    {{--
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
    --}}

@endsection