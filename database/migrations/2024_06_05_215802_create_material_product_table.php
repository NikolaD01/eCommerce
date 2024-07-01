<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialProductTable extends Migration
{
    public function up()
    {
        Schema::create('material_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('material_product');
    }
}
