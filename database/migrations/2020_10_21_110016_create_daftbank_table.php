<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftbankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftbank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodebank');
            $table->string('namabank');
            $table->string('singkatan');
            $table->text('alamat');
            $table->string('telpon');
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
        Schema::dropIfExists('daftbank');
    }
}
