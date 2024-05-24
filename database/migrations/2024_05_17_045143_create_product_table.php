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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->double('old_price', null, 0)->nullable()->default(0);
            $table->double('price', null, 0)->default(0);
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->text('additional_description');
            $table->integer('status')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->tinyInteger('is_delete')->default(0);
            $table->integer('created_by')->nullable();
            $table->string('sku', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
