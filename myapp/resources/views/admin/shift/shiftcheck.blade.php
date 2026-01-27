@extends('layouts.app')

@section('content')
<h1>シフト確認</h1>

<table border="1">
    <tr>
        <th>日付</th>
        <th>シフト</th>
    </tr>

    @foreach ($shifts as $date => $shift)
        <tr>
            <td>{{ $date }}</td>
            <td>{{ $shift }}</td>
        </tr>
    @endforeach
</table>

<form method="POST" action="{{ route('shift.submit') }}">
    @csrf
    <input type="hidden" name="shifts" value='@json($shifts)'>
    <button type="submit">確定</button>
</form>

<a href="{{ route('shift.index') }}">戻る</a>
@endsection
