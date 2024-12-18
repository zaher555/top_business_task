<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->nullable()->cascadeOnDelete();
            $table->bigInteger('amount_per_month');
            $table->bigInteger('paid_amount');
            $table->bigInteger('unpaid_amount');
            $table->enum('payment_status',['not_finished','finished'])->default('not_finished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
