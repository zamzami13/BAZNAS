<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaandet extends Model
{
    Protected $table = 'penerimaandet';
    Protected $fillable = ['penerimaan_id','matangd_id','jumlah'];


    //Relasi DB
    public function penerimaan()
    {
    	return $this->belongsTo(Penerimaan::class);
    }
    public function matangd()
    {
    	return $this->belongsTo(Matangd::class);
    }
}
