<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('id_subcategory');
            $table->string('name_subcategory',50);
            $table->integer('parent_subcategory');
        });
    }
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
