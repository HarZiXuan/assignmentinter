<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('login', function (Blueprint $table) {
            //
        });
        $users = DB::table('login')->get();

    foreach ($users as $user) {
        // Only hash if not already hashed (assuming plaintext)
        DB::table('login')->where('id', $user->id)->update([
            'password' => Hash::make($user->password)
        ]);
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login', function (Blueprint $table) {
            //
        });
    }
};
