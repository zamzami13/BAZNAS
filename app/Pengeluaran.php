<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    Protected $table = 'pengeluaran';
    Protected $fillable = ['jenistransaksi','nokeluar','tanggal','penerima','daftbank_id','rekpenerima','bukti','uraian'];
    
    //relasi DB
    public function pengeluarandet()
    {
    	return $this->hasMany(Pengeluarandet::class);
    }

    public function daftbank()
    {
    	return $this->belongsTo(Daftbank::class);
    }
}
