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
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->integer('phone')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('shopname', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('account_holder', 255)->nullable();
            $table->integer('account_number')->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('bank_branch', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->integer('created_by');
            $table->integer('is_delete')->default(0);
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
