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
            $table->foreignId('employees_id')->constrained('employees'); // user who created the ticket
            $table->foreignId('statuses_id')->constrained('ticket_statuses')->default(1); // support user assigned to the ticket
            $table->foreignId('manager_id')->nullable()->constrained('managers'); // support user assigned to the ticket
            $table->integer('ticket_closed')->default(0);
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
