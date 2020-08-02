<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_wallets', function (Blueprint $table) {
            $table->id();
            $table->string('ticker');
            $table->string('name');
            $table->string('address');
            $table->string('public_key');
            $table->string('private_key');
            $table->string('amount');
            $table->string('url');
            $table->integer('status');
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
        Schema::dropIfExists('system_wallets');
    }
}
