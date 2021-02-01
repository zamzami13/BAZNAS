<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pergeseran extends Model
{
    Protected $table = 'pergeseran';
    Protected $fillable = ['jenistransaksi','nomor','kodetrans','tanggal','daftbank_id','bukti','uraian','jumlah'];
    
    //relasi DB

    public function daftbank()
    {
    	return $this->belongsTo(Daftbank::class);
    }
}
