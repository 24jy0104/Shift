

<table border="1">
    <tr>
        <th>名前</th>
        @foreach ($dates as $date)
            <th>{{ \Carbon\Carbon::parse($date)->format('n/d') }}</th>
        @endforeach
    </tr>

    @foreach ($staffs as $staff)
        <tr>
            <td>{{ $staff->name }}</td>
            @foreach ($dates as $date)
                @php
                    $value = $shifts[$staff->id]->firstWhere('date', $date)->start_time ?? '◎';
                    if($value === null) $value = '◎';
                @endphp
                <td>{{ $value }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
