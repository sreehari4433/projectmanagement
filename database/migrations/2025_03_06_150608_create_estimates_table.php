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
    Schema::create('estimates', function (Blueprint $table) {
        $table->id();
        $table->string('client_name')->nullable(); // Allow NULL values
        $table->string('client_email')->nullable();
        $table->text('description')->nullable();
        $table->decimal('total_amount', 10, 2);
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
