<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('coin_pair');
            $table->string('amount');
            $table->string('price');
            $table->string('quantity');
            $table->enum('type',['buy','sell','stake']);
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
        Schema::dropIfExists('trade_logs');
    }
}
