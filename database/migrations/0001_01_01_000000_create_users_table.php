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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('personal_email', 100)->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cnic', 100)->unique()->nullable()->comment('CNIC Number');
            $table->date('date_of_birth')->nullable();
            $table->string('religion', 100)->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->string('state_name', 50)->nullable();
            $table->string('current_address', 255)->nullable();
            $table->string('permanent_address', 255)->nullable();
            $table->string('primary_contact', 191)->nullable();
            $table->string('secondary_contact', 191)->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->string('rcl_number')->nullable();
            $table->string('profile_photo')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('tax_number')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
