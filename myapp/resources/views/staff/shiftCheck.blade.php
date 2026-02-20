@extends('layouts.app')

@section('content')
<h1>シフト確認</h1>

<h2 class="calendar-month">
    {{ $today->format('Y年n月') }}
</h2>

@php
    $firstDay = $today->copy()->startOfMonth();
    $lastDay = $today->copy()->endOfMonth();
    $weekdays = ['日','月','火','水','木','金','土'];
@endphp

<table border="1" cellpadding="5" cellspacing="0" class="calendar-table">
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
        @for ($i = 0; $i < $startWeekday; $i++)
            <td></td>
        @endfor

        @while ($currentDay->lte($lastDay))
            @php
                $dateKey = $currentDay->format('Y-m-d');
            @endphp

            <td class="day-cell">
                <div class="day-number">{{ $currentDay->day }}</div>

                <div class="shift-display">
                    {{ $shifts[$dateKey] ?? '' }}
                </div>
            </td>

            @if ($currentDay->dayOfWeek == 6)
                </tr><tr>
            @endif

            @php $currentDay->addDay(); @endphp
        @endwhile

        @for ($i = $lastDay->dayOfWeek + 1; $i <= 6; $i++)
            <td></td>
        @endfor
    </tr>
</table>

<form method="POST" action="{{ route('shift.insert') }}">
    @csrf
    <input type="hidden" name="shifts" value='@json($shifts)'>
    <button type="submit">確定</button>
</form>

<a href="{{ route('shift.index') }}">戻る</a>

@endsection

