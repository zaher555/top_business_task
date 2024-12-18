<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(employeeSeeder::class);
        for($i=0;$i<100;$i++)
        {
        $this->call(attendanceSeeder::class);
        }
        $this->call(loanSeeder::class);
        $this->call(deductionSeeder::class);
    }
}
