<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallotBackLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballot_back_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ticker');
            $table->string('base');
            $table->string('address');
            $table->string('image');
            $table->string('circulation')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('white_paper')->nullable();
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
        Schema::dropIfExists('ballot_back_logs');
    }
}
