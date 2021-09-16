<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('invoice');
            $table->string('qrcode');
            $table->string('nama_penumpang');
            $table->text('alamat_penumpang');
            $table->string('no_penumpang');
            $table->text('alamat_penjemputan');
            $table->text('alamat_pemberhentian');
            $table->integer('origin_id');
            $table->integer('destination_id');
            $table->integer('subtotal');
            $table->integer('diskon')->nullable();
            $table->integer('total');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_transactions');
    }
}
