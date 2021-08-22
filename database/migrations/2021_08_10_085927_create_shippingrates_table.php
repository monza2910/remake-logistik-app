<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingrates', function (Blueprint $table) {
            $table->id();
            $table->integer('origin_id');
            $table->integer('destination_id');
            $table->integer('under_terms');
            $table->integer('above_terms');
            $table->string('est_arrived');
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
        Schema::dropIfExists('shippingrates');
    }
}
