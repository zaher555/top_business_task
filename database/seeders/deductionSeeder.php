<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class deductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total_loans = DB::table('loans')->where('id', 1)->value('amount');
        $status = ['not_finished', 'finished'][rand(0, 1)];
        $paid_amount=10000;
        $unpaid_amount=0;
        if($paid_amount===$total_loans)
        {
            $status='finished';
        }
        else if($paid_amount<$total_loans)
        {
            $status='not_finished';
            $unpaid_amount=$total_loans-$paid_amount;
        };
        DB::table('deductions')->insert([
            'loan_id' => 1,
            'amount_per_month' => $total_loans/4,
            'paid_amount'=>$paid_amount,
            'unpaid_amount'=>$unpaid_amount,
            'payment_status'=>$status
        ]);   
    }
}
