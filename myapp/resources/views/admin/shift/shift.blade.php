@extends('layouts.app')

@section('content')
<h1>シフト管理（カレンダー表示）</h1>

@php
    $firstDay = $today->copy()->startOfMonth();
    $lastDay = $today->copy()->endOfMonth();
    $weekdays = ['日', '月', '火', '水', '木', '金', '土'];
@endphp

<form method="POST" action="{{ route('shift.submit') }}">
    @csrf
    <input type="hidden" name="shifts" id="shiftsInput">

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
                <td class="day-cell" data-date="{{ $currentDay->format('Y-m-d') }}">
                    <div class="day-number">{{ $currentDay->day }}</div>

                        <!-- ここに選択内容を表示 -->
                    <div class="shift-display"></div>
                    <div class="shift-form hidden">

                        <select class="time-range">
                            <option value="">選択</option>
                            <option value="◎">◎</option>
                            <option value="17:00">17時00分</option>
                            <option value="17:15">17時15分</option>
                            <option value="17:30">17時30分</option>
                            <option value="17:45">17時45分</option>
                            <option value="18:00">18時00分</option>
                        </select>
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

    <button type="submit" onclick="sendShift()">提出</button>
</form>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection
