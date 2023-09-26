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
        Schema::create('receipt_tables', function (Blueprint $table) {
            $table->foreignId('receipt_id')->constrained('receipts');
            $table->foreignId('table_id')->constrained('table_coffees');
            $table->primary(['receipt_id', 'table_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_tables');
    }
};
