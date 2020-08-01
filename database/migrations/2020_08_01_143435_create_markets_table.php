<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->string('wallet_id');
            $table->string('pair');
            $table->enum('type',['buy','sell']);
            $table->string('target_coin');
            $table->string('base_coin');
            $table->string('price');
            $table->string('amount');
            $table->string('total');
            $table->string('stat');
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
        Schema::dropIfExists('markets');
    }
}
