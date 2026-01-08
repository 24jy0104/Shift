{{-- resources/views/admin/staff/staffList.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>スタッフ一覧</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>レジ番号</th>
            <th>名前</th>
            <th>勤務区分</th>
            <th>メール</th>
            <th></th>
        </tr>

        @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->register_number }}</td>
                <td>{{ $staff->name }}</td>
                <td>
                    @if ($staff->work_type === 'morning')
                        朝
                    @elseif ($staff->work_type === 'night')
                        夜
                    @else
                        両方
                    @endif
                </td>
                <td>{{ $staff->email }}</td>
                <td><a href="/admin/staff/{{ $staff->id }}/edit">編集</a></td>
            </tr>
        @endforeach
    </table>

    <br>
    <a href="/admin/menu">管理者メニューに戻る</a>
@endsection