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
        Schema::create('vaccine_center_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vaccine_center_id');
            $table->date('schedule_date');
            $table->unsignedInteger('schedule_limit')->default(0);
            $table->unsignedInteger('appointment_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_center_schedules');
    }
};
