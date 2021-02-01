<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('jenistransaksi', array('Transfer', 'Tunai'));
            $table->char('nomasuk',5);
            $table->date('tanggal');
            $table->char('donatur',80);
            $table->integer('daftbank_id');
            $table->char('rekpengirim',30);
            $table->char('bukti',100);
            $table->string('uraian',200);
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
        Schema::dropIfExists('penerimaan');
    }
}
