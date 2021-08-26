<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('shot_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('regular_price');
            $table->decimal('sell_price')->nullable();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('quantity')->default(10);
            $table->string('image');
            $table->text('image_gallery')->nullable();
            $table->enum('stock_status', ['instock', 'outstock']);
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
