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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('status', ['draft', 'trash', 'published']);
            $table->string('url');
            $table->string('imported_t');
            $table->string('creator');
            $table->timestamp('created_at');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('brands')->nullable();
            $table->longText('categories');
            $table->string('labels')->nullable();
            $table->string('cities')->nullable();
            $table->longText('purchase_places')->nullable();
            $table->longText('stores')->nullable();
            $table->longText('ingredients_text')->nullable();
            $table->longText('traces')->nullable();
            $table->decimal('serving_quantity')->nullable();
            $table->integer('nutriscore_score')->nullable();
            $table->string('nutriscore_grade')->nullable();
            $table->string('main_category')->nullable();
            $table->string('image_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
