<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class attendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::create(2024, 9, 1);  // Start date (January 1, 2024)
        $endDate = Carbon::create(2024, 12, 31);  // End date (December 31, 2024)
        $randomDate = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));
        $status = ['present', 'absent'][rand(0, 1)];
        $attendance_time=0;
        $depature_time=0;
        $month=$randomDate->month;
        if($status==='absent')
        {
            $attendance_time=0;
            $depature_time=0;
        }
        else if($status==='present')
        {
            $attendance_time=rand(8,15);
            $depature_time=rand($attendance_time+1,16);  
        };
        
            DB::table('attendances')->insert([
                'employee_id' => 1,
                'attendance_date' => $randomDate->toDateString(),
                'month'=>$month,
                'attendance_time'=>$attendance_time,
                'depature_time'=>$depature_time,
                'total_hours'=>$depature_time-$attendance_time,
                'status'=>$status
            ]);   
    }
}
