<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('name_product',50);
            $table->decimal('val_product',8,2);
            $table->string('des_product',200);
            $table->string('photo_product',200);
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
