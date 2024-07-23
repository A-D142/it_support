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
        Schema::create('tickets', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('user_id')->constrained('users'); // user who created the ticket
            $table->foreignId('statuses_id')->constrained('ticket_statuses')->default(1); // support user assigned to the ticket
            $table->foreignId('employee_id')->nullable()->constrained('employees'); // support user assigned to the ticket
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
