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
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('company_name', 255)->nullable();
            $table->string('company_address', 255)->nullable();
            $table->string('company_email', 255)->nullable();
            $table->string('company_phone', 255)->nullable();
            $table->string('company_logo', 255)->nullable();
            $table->string('company_mobile', 255)->nullable();
            $table->string('company_city', 255)->nullable();
            $table->string('company_country', 255)->nullable();
            $table->string('company_zipcode', 255)->nullable();
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
