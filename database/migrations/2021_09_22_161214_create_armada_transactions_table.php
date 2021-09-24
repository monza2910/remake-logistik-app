<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmadaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armada_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('tracking_number');
            $table->string('qr_code');
            $table->string('penyewa');
            $table->text('alamat_penyewa');
            $table->string('no_penyewa');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->integer('lama_sewa')->nullable();
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
        Schema::dropIfExists('armada_transactions');
    }
}
