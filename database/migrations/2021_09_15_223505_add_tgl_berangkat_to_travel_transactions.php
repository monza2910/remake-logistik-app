<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTglBerangkatToTravelTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_transactions', function (Blueprint $table) {
            $table->date('tgl_berangkat');
            $table->string('jam_berangkat');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travel_transactions', function (Blueprint $table) {
            //
        });
    }
}
