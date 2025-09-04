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
        Schema::table('room_details', function (Blueprint $table) {
            $table->renameColumn('person', 'adult');
            $table->integer('child')->default(0);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adult', function (Blueprint $table) {
            $table->renameColumn('adult', 'person');
            $table->dropColumn('child');
        });
    }
};
