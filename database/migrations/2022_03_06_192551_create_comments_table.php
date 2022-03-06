<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content');
            $table->datetime('date');
            $table->BigInteger('author_id');
            $table->foreign('author_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            $table->BigInteger('serie_id');
            $table->foreign('serie_id')
            ->references('id')
            ->on('series')
            ->onDelete('cascade')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
