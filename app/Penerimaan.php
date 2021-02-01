<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    Protected $table = 'penerimaan';
    Protected $fillable = ['jenistransaksi','nomasuk','tanggal','donatur','daftbank_id','rekpengirim','bukti','uraian'];
    
    //relasi DB
    public function penerimaandet()
    {
    	return $this->hasMany(Penerimaandet::class);
    }

    public function daftbank()
    {
    	return $this->belongsTo(Daftbank::class);
    }
}
