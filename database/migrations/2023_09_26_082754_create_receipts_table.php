<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('total_price');
            $table->text('note')->nullable();
            $table->string('order_date');
            $table->string('order_at');
            $table->foreignId('employee_id')->nullable()->constrained('employees');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('table_id')->nullable()->constrained('table_coffees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
