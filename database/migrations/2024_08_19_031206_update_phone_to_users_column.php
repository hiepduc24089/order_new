<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update the phone column where username is admin
        DB::table('users')
            ->where('username', 'admin')
            ->update(['phone' => '0123456789']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally revert the phone number to a previous value or NULL if you want
        DB::table('users')
            ->where('username', 'admin')
            ->update(['phone' => null]);
    }
};
