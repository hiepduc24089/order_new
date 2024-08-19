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
        Schema::table('tracking_orders', function (Blueprint $table) {
            $table->longText('note')->nullable()->default(null)->after('bag_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracking_orders', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
};
