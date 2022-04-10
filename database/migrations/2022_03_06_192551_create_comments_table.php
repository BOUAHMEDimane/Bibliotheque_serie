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
            $table->bigIncrements('id');
            $table->mediumText('content');
            //$table->datetime('date');
            $table->timestamps();
            $table->unsignedBigInteger('author_id');
            //$table->integer('commentable_id');
            //$table->string('commentable_type');
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
