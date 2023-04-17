<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('deleted_at', 'old_deleted_at');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('deleted_at')->nullable();
        });
        DB::table('users')
            ->whereNotNull('old_deleted_at')
            ->update(['deleted_at' => DB::raw('old_deleted_at')]);
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('old_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('old_deleted_at', 'deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });

        DB::table('users')
            ->whereNotNull('deleted_at')
            ->update(['old_deleted_at' => DB::raw('deleted_at')]);

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('old_deleted_at', 'deleted_at');
        });
    }
};
