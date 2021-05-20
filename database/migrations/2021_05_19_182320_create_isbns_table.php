<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsbnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('isbns');
        Schema::create('isbns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned(); //musi byc taki sam typ jak referencja
            $table->string('number');
            $table->string('issued_by');
            $table->string('issued_on');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isbns');
    }
}
