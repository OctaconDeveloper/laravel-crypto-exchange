<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->string('first_token');
            $table->string('second_token');
            $table->string('third_token');
            $table->string('fourth_token');
            $table->string('first_file');
            $table->string('second_file');
            $table->string('third_file');
            $table->string('fourth_file');
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('ballots');
    }
}
