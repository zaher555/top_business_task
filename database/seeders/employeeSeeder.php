<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'position'=>'IT',
            'hiring_date'=>'2024-01-01',
            'salary'=>10000
        ]);
    }
}
