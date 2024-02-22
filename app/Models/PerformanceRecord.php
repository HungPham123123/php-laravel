<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceRecord extends Model
{
    protected $fillable = ['employee_id', 'year', 'month', 'days_worked', 'days_leave', 'rate', 'Rate_leaved'];

    // Define relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
