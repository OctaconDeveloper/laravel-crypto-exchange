<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('surname')->nullable();
            $table->string('othernames')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('idcard')->nullable();
            $table->integer('stat')->default(0);
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
        Schema::dropIfExists('customer_verifications');
    }
}
