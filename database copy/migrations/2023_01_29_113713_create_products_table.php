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
            $table->string('name');
            $table->decimal('price',10,2);
            $table->bigInteger('category');
            $table->string('image');
            $table->json('images')->nullable();
            $table->decimal('discount',10,2)->default(0.00);
            $table->string('slug')->unique();
            $table->text('short_desc')->nullable();
            $table->longText('description');
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
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
