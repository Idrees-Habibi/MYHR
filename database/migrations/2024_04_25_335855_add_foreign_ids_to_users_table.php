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
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('branch_id')->nullable()->references('id')->on('branches');
            $table->foreignId('department_id')->nullable()->references('id')->on('departments');
            $table->foreignId('country_id')->nullable()->references('id')->on('countries');
            $table->foreignId('role_id')->after('id')->nullable()->on('roles');
            $table->foreignId('position_id')->nullable()->references('id')->on('positions');
            $table->foreignId('state_id')->nullable()->references('id')->on('states');
            $table->foreignId('city_id')->nullable()->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
