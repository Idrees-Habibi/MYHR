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
        Schema::create('user_family_details', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('cnic')->unique()->nullable()->default(null)->comment('spouse CNIC Number');
            $table->date('date_of_birth')->nullable();
            $table->enum('type', ['Husband', 'Wife', 'Kid'])->default('Husband');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_family_details');
    }
};
