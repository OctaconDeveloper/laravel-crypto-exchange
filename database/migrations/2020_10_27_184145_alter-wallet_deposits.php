<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWalletDeposits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallet_deposits', function (Blueprint $table) {
            $table->string('trackID');
            $table->string('transID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet_deposits', function (Blueprint $table) {
            $table->dropColumn('trackID');
            $table->dropColumn('transID');
        });
    }
}
