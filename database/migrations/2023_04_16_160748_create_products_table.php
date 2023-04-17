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
            $table->enum('status', ['draft', 'trash', 'published'])->default('published');
            $table->longText('url');
            $table->timestamp('imported_t')->useCurrent();
            $table->string('creator');
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('brands')->nullable();
            $table->longText('categories')->nullable();
            $table->string('labels')->nullable();
            $table->string('cities')->nullable();
            $table->longText('purchase_places')->nullable();
            $table->longText('stores')->nullable();
            $table->longText('ingredients_text')->nullable();
            $table->longText('traces')->nullable();
            $table->string('serving_size')->nullable();
            $table->decimal('serving_quantity')->nullable();
            $table->integer('nutriscore_score')->nullable();
            $table->string('nutriscore_grade')->nullable();
            $table->string('main_category')->nullable();
            $table->string('image_url')->nullable();
            $table->date('last_modified_t')->nullable();
            $table->string('created_t')->nullable();
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
