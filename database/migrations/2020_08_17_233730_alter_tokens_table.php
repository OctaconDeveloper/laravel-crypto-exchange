<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tokens', function (Blueprint $table) {
            $table->string('circulation')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('white_paper')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tokens', function (Blueprint $table) {
            $table->dropColumn('circulation');
            $table->dropColumn('description');
            $table->dropColumn('url');
            $table->dropColumn('white_paper');
        });
    }
}
