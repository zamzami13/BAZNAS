<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    Protected $table = 'pejabat';
    Protected $fillable = ['jabatan','nama'];

}
