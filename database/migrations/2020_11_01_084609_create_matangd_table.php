<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatangdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matangd', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kdrek',15);
            $table->string('nmrek',100);
            $table->enum('type', array('H', 'D'));
            $table->integer('kdlevel');
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
        Schema::dropIfExists('matangd');
    }
}
