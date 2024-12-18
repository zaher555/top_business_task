<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container border p-5">
        <div>
            Name:{{$employee->name}}
        </div>
        <div>
            Email:{{$employee->email}}
        </div>
        <div>
            Position:{{$employee->position}}
        </div>
        <div>
            Hiring Date:{{$employee->hiring_date}}
        </div>
        <div class="border">
            <h1 class="text-center bg-success text-white">Attendance and Depature</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">attendance_date</th>
                    <th scope="col">attendance_time</th>
                    <th scope="col">depature_time</th>
                    <th scope="col">total_hours</th>
                    <th scope="col">Attendace_status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($employee_attendance as $attend )
                        <tr>
                            <th scope="row">{{$attend->attendance_date}}</th>
                            <td>{{$attend->attendance_time}}</td>
                            <td>{{$attend->depature_time}}</td>
                            <td>{{$attend->total_hours}}</td>
                            <td>{{$attend->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>    
        </div>
        <div class="border">
            <h1 class="text-center bg-success text-white">Monthly summary</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Total Attendance</th>
                    <th scope="col">Total Absence</th>
                    <th scope="col">Loan</th>
                    <th scope="col">Amount Pair Month</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Unpaid</th>
                    <th>Status</th>
                    <th>Basic Salary</th>
                    <th>Net Salary</th>
                    <th>Total Deduction</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$total_attendance}}</td>
                            <td>{{$total_absence}}</td>
                            <td>{{ $total_loans[0]->amount }}</td>
                            <td>{{$deductions[0]->amount_per_month}}</td>
                            <td>{{$deductions[0]->paid_amount}}</td>
                            <td>{{$deductions[0]->unpaid_amount}}</td>
                            <td>{{$deductions[0]->payment_status}}</td>
                            <td>{{$basic_salary[0]->salary}}</td>
                            <td>{{$net_salary}}</td>
                            <td>{{$total_deduction}}</td>
                        </tr>
                </tbody>
              </table>    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
