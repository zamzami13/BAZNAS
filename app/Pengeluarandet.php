<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluarandet extends Model
{
    Protected $table = 'pengeluarandet';
    Protected $fillable = ['pengeluaran_id','matangr_id','jumlah','sumberdana'];


    //Relasi DB
    public function pengeluaran()
    {
    	return $this->belongsTo(Pengeluaran::class);
    }
    public function matangr()
    {
    	return $this->belongsTo(Matangr::class);
    }
}
