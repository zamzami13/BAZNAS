<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matangd extends Model
{
    Protected $table = 'matangd';
    Protected $fillable = ['kdrek','nmrek','type','kdlevel'];

    public function penerimaanndet()
    {
    	return $this->hasMany(Penerimaaandet::class);
    }
}
