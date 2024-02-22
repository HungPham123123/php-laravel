<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/employee/login', [LoginController::class, 'employeeLogin'])->name('employee.login');
Route::get('/performance', [PerformanceController::class, 'showPerformanceRecords']);
Route::post('/checkin', [EmployeeController::class, 'checkIn'])->name('employee.checkin');
Route::post('/checkout', [EmployeeController::class, 'checkOut'])->name('employee.checkout');
Route::get('/dashboard', [EmployeeController::class, 'showDashboard'])->name('employee.dashboard');


