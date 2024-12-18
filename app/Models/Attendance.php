<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=['employee_id','attendance_date','attendance_time','depature_time','total_hours'];
}
