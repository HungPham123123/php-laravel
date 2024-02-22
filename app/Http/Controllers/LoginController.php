<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Employee;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::where('email', $email)->first();

        if ($admin && $admin->password === $password) {
            return redirect()->intended('/performance');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function employeeLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $employee = Employee::where('email', $email)->first();

        if ($employee && $employee->password === $password) {

            $request->session()->put('employee_id', $employee->id);

            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function registerEmployee(Request $request)
    {
        // Validate request data...

        // Assuming you have validation rules here

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password')); // Hash the password
        $employee->save();

        // Redirect or respond with success message...
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
