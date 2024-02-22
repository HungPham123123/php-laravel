<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AttendanceRecord;
use App\Models\PerformanceRecord;

class PerformanceController extends Controller
{


    public function showPerformanceRecords()
    {
        $performanceRecords = PerformanceRecord::with('employee')->get();

        return view('performance', ['performanceRecords' => $performanceRecords]);
    }


}
