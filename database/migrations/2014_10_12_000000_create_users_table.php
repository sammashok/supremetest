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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 45)->nullable()->unique();
            $table->enum('gender', ['M', 'F'])->default('M')->index();
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->enum('type', ['customer', 'admin'])->default('customer');
            $table->boolean('notifiable')->default(true);
            $table->rememberToken();
            $table->authors();
            $table->timestamps();
            $table->softDeletes();
            $table->fullText(['last_name', 'first_name', 'phone', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
