<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('tracking_number');
            $table->string('qr_code');
            $table->string('penerima');
            $table->text('alamat_penerima');
            $table->string('no_penerima');
            $table->string('pengirim');
            $table->text('alamat_pengirim');
            $table->string('no_pengirim');
            $table->integer('origin_id');
            $table->integer('destination_id');
            $table->integer('variantservice_id');
            $table->integer('berat_total');
            $table->integer('harga_kg');
            $table->integer('sub_total');
            $table->integer('diskon')->nullable();
            $table->integer('total');
            $table->integer('total_bayar');
            $table->string('status');
            $table->string('user_id');
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
        Schema::dropIfExists('transactions');
    }
}
