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
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->unsignedBigInteger('siswa_id')->nullable()->after('id');
            $table->unsignedBigInteger('admin_id')->nullable()->after('siswa_id');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('set null');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['admin_id']);
            $table->dropColumn(['siswa_id', 'admin_id']);
        });
    }
};
