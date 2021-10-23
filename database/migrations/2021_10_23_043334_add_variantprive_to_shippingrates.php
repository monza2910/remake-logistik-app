<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVariantpriveToShippingrates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippingrates', function (Blueprint $table) {
            $table->integer('one_ton');
            $table->integer('five_ton');
            $table->integer('ten_ton');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shippingrates', function (Blueprint $table) {
            //
        });
    }
}
