<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
</head>
<body>
@extends('app')
<h2>Performance</h2>
@foreach ($performanceRecords as $record)
    <p>Days Worked: {{ $record->days_worked }}/365</p>
    <p>Days Leave: {{ $record->days_leave }}/12</p>
    <p>Rate Leaved: {{ $record->Rate_leaved }}%</p> <!-- Display rate leaved -->
@endforeach

<!-- Check-in form -->
<form action="{{ route('employee.checkin') }}" method="POST">
    @csrf
    <button type="submit">Check In</button>
</form>

<!-- Check-out form -->
<form action="{{ route('employee.checkout') }}" method="POST">
    @csrf
    <button type="submit">Check Out</button>
</form>


<h2>Work Details</h2>
<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Worked Hours</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>
