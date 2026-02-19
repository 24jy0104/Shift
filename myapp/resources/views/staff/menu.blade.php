@extends('layouts.app')

@section('content')
    <h1>バイト画面</h1>

    <ul>
        <li><a href="/staff/shift">シフト提出</a></li>
    </ul>

    {{--
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
    --}}

@endsection