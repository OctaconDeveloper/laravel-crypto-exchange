<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('wallet_id')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('refCode')->nullable();
            $table->string('referral')->nullable();
            $table->integer('tradeStat')->default(0);
            $table->integer('chatStat')->default(0);
            $table->string('picture')->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('tfa_stat')->default(0);
            $table->string('secret')->nullable();
            $table->string('qrcode_url')->nullable();
            $table->string('location')->nullable();
            $table->string('activation_code')->unique();
            $table->integer('user_type_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
