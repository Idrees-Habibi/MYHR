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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id')->nullable()->default(null);
            $table->string('name')->length(100)->nullable()->default(null);
            $table->string('route_name')->length(255)->nullable()->default(null);
            $table->string('path')->length(255)->nullable()->default(null);
            $table->string('icon')->length(100)->nullable()->default(null);
            $table->string('alias')->length(100)->unique()->nullable()->default(null);
            $table->boolean('is_active')->default(false);
            $table->string('href')->length(100)->nullable()->default(null);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
