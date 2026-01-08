
@extends('layouts.app')

@section('content')
    <h1>シフト管理（カレンダー表示）</h1>

    @php
        // 今月の初日と末日を取得
        $firstDay = $today->copy()->startOfMonth();
        $lastDay = $today->copy()->endOfMonth();

        // 曜日ヘッダー用
        $weekdays = ['日', '月', '火', '水', '木', '金', '土'];
    @endphp

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            @foreach ($weekdays as $day)
                <th>{{ $day }}</th>
            @endforeach
        </tr>

        @php
            $currentDay = $firstDay->copy();
            $startWeekday = $firstDay->dayOfWeek;
        @endphp

        <tr>
            {{-- 月の初日の前は空セル --}}
            @for ($i = 0; $i < $startWeekday; $i++)
                <td></td>
            @endfor

            {{-- 日付を表示 --}}
            @while ($currentDay->lte($lastDay))
                <td>{{ $currentDay->day }}</td>

                @if ($currentDay->dayOfWeek == 6)
                    </tr><tr>
                @endif

                @php
                    $currentDay->addDay();
                @endphp
            @endwhile

            {{-- 最後の週の空セル --}}
            @php
                $endWeekday = $lastDay->dayOfWeek;
            @endphp
            @for ($i = $endWeekday + 1; $i <= 6; $i++)
                <td></td>
            @endfor
        </tr>
    </table>
@endsection
