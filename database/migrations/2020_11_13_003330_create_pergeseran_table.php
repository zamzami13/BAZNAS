<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePergeseranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pergeseran', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('jenistransaksi', array('kebank', 'ketunai'));
            $table->char('nomor',10);
            $table->date('tanggal');
            $table->integer('daftbank_id');
            $table->char('bukti',100);
            $table->string('uraian',200);
            $table->decimal('jumlah',19,2);
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
        Schema::dropIfExists('pergeseran');
    }
}
