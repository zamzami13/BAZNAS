<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matangr extends Model
{
    Protected $table = 'matangr';
    Protected $fillable = ['kdrek','nmrek','type','kdlevel'];

    public function pengeluarandet()
    {
    	return $this->hasMany(Pengeluarandet::class);
    }
}
