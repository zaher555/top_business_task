<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Employee;
use App\Models\Deduction;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::all();
        return view('employee.index',compact('employees'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $loan=new Loan();
        $latestMonth=Carbon::now()->month; //get month now
        
        $employee_attendance=Attendance::where('employee_id',$employee['id'])->where('month',$latestMonth)->get(); //get attendance of specific employee
        $total_attendance=count(Attendance::where('employee_id',$employee['id'])->where('status','present')->where('month',$latestMonth)->get());
        $total_absence=count(Attendance::where('employee_id',$employee['id'])->where('status','absent')->where('month',$latestMonth)->get());
        $total_loans = DB::select('select amount from loans where employee_id = :empId', ['empId' => $employee['id']]); 
        
        $basic_salary=DB::select('select salary from employees where id=:empId', ['empId' => $employee['id']]);
        
        $deductions=Deduction::where('id',1)->get();
        
        //calculations of net_salary after deduction 
        $total_hours_in_month=8*25;
        $hour_price=$basic_salary[0]->salary/$total_hours_in_month;
        $total_worked_hours = DB::table('attendances')->where('month', $latestMonth)->where('employee_id',$employee['id'])->sum('total_hours');
        $loan_id=Loan::where('employee_id',$employee['id'])->first()->id;
        $loan_status = DB::table('deductions')->where('loan_id', $loan_id)->first()->payment_status;
        $payment_per_month = DB::table('deductions')->where('loan_id', $loan_id)->first()->amount_per_month;
        $net_salary=$total_worked_hours*$hour_price;
        if($loan_status=="not_finished")
        {
            $net_salary=$total_worked_hours*$hour_price-$payment_per_month;
        }
        $total_deduction=$basic_salary[0]->salary-$net_salary;
        return view('employee.show',
        compact(
            'employee',
            'employee_attendance',
            'total_attendance',
            'total_absence',
            'total_loans',
            'deductions',
            'basic_salary',
            'net_salary',
            'total_deduction'
        ));
    }
}
