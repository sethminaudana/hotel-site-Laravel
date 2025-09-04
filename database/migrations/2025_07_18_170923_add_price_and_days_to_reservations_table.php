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
        Schema::table('reservations', function (Blueprint $table) {
            $table->decimal('mealPrice', 10,2)->nullable()->after('mealPlan');
            $table->decimal('roomPrice',10,2)->nullable()->after('mealPrice');
            $table->integer('numDays')->nullable()->after('roomPrice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['mealprice', 'roomprice', 'numDays']);
        });
    }
};
