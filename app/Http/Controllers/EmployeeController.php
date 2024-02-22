<?php

namespace App\Http\Controllers;

use App\Models\PerformanceRecord;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showDashboard(Request $request)
    {
        $employeeId = $request->session()->get('employee_id');

        $performanceRecords = PerformanceRecord::where('employee_id', $employeeId)->get();

        return view('dashboard', ['performanceRecords' => $performanceRecords]);
    }

    public function checkIn(Request $request)
    {
        $employeeId = session('employee_id');
        $performanceRecord = PerformanceRecord::where('employee_id', $employeeId)->first();

        $performanceRecord->increment('days_worked');

        $totalDays = 365;
        $ratePercentage = ($performanceRecord->days_worked / $totalDays) * 100;

        $performanceRecord->rate = $ratePercentage;
        $performanceRecord->save();

        return redirect()->route('employee.dashboard')->with('success', 'Checked in successfully.');
    }




    public function checkOut(Request $request)
    {
        $employeeId = session('employee_id');
        $performanceRecord = PerformanceRecord::where('employee_id', $employeeId)->first();

        $performanceRecord->increment('days_leave');

        $totalLeaveDays = 12;
        $currentLeaveDays = $performanceRecord->days_leave;

        $rateLeavedPercentage = ($currentLeaveDays / $totalLeaveDays) * 100;

        $performanceRecord->rate_leaved = $rateLeavedPercentage;
        $performanceRecord->save();

        return redirect()->route('employee.dashboard')->with('success', 'Checked out successfully.');
    }

}
