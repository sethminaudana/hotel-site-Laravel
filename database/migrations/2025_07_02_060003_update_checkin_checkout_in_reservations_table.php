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
            $table->dropColumn(['checkInDate', 'checkOutDate', 'checkInTime', 'checkOutTime']);
            $table->dateTime('checkin_datetime')->nullable();
            $table->dateTime('checkout_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('checkInDate')->nullable();
            $table->date('checkOutDate')->nullable();
            $table->time('checkInTime')->nullable();
            $table->time('checkOutTime')->nullable();
            $table->dropColumn(['checkin_datetime', 'checkout_datetime']);
        });
    }
};
