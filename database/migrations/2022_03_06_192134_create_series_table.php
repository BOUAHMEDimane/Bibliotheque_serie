<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('author_id');
            $table->MediumText('title');
            $table->LongText('content');
            $table->LongText('acteurs');
            $table->char('url', 200);
            $table->Text('tags')->nullable();
            $table->datetime('date');
            $table->string('status', 45);
            $table->timestamps();
            //$table->char('image', 45);
            $table->foreign('author_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('series');
    }
}
