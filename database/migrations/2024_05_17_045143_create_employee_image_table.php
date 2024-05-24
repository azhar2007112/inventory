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
        Schema::create('employee_image', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable();
            $table->string('image_name', 255)->nullable();
            $table->string('image_extension', 255)->nullable();
            $table->integer('order_by')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_image');
    }
};
