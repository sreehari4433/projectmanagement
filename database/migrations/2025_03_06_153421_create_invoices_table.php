<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->string('invoice_number');
        $table->date('invoice_date');
        $table->decimal('total_amount', 10, 2);
        $table->enum('status', ['unpaid', 'paid', 'overdue'])->default('unpaid');
        $table->timestamps();

        // ✅ Ensure the foreign key is correctly referenced
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
