<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompareProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('oracle')->create('compare_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('prod_id_1');
            $table->string('prod_id_2');
            $table->string('prod_disc_1');
            $table->string('prod_disc_2');
            $table->string('prod_price_1');
            $table->string('prod_price_2');
            $table->timestamps();
        });

        Schema::connection('oracle')->table('files', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('oracle')->dropIfExists('compare_products');
    }
}
