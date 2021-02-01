<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftbank extends Model
{
    Protected $table = 'daftbank';
    Protected $fillable = ['kodebank','namabank','singkatan','norekbank','nmrekbank','alamat','telpon','sumberdana','soawal'];

    //relasi DB
    public function pengeluaran()
    {
    	return $this->hasMany(Pengeluaran::class);
    }

	public function pengerimaan()
    {
    	return $this->hasMany(Penerimaan::class);
    }

    public function pergeseran()
    {
    	return $this->hasMany(Pergeseran::class);
    }
}
