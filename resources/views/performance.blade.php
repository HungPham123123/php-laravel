<!-- resources/views/performance.blade.php -->

@extends('app')

@section('content')
    <h1>Performance Records</h1>

    <table>
        <thead>
        <tr>
            <th>Employee ID</th>
            <th>Year</th>
            <th>Month</th>
            <th>Days Worked</th>
            <th>Days Leave</th>
            <th>Rate</th>
            <th>Rate leave</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($performanceRecords as $record)
            <tr>
                <td>{{ $record->employee_id }}</td>
                <td>{{ $record->year }}</td>
                <td>{{ $record->month }}</td>
                <td>{{ $record->days_worked }}/365</td>
                <td>{{ $record->days_leave }}/12</td>
                <td>{{ $record->rate }}%</td>
                <td>{{$record->Rate_leaved}}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
