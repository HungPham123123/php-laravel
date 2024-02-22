<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    protected $fillable = ['employee_id', 'date', 'is_leave'];

    // Define relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
