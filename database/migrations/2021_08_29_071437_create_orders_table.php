<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('name_id')->unsigned();
            $table->foreign('name_id')->references('id')->on('coffee_names')->onDelete('cascade');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('coffee_types')->onDelete('cascade');

            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('cups')->onDelete('cascade');

            $table->string('sugar')->nullable();
            $table->integer('quantity');
            $table->float('price',5,2);
            $table->float('total');
            $table->timestamp('date')->useCurrent();
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
        Schema::dropIfExists('orders');
    }
}
