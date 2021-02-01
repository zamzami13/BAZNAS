<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muser extends Model
{
    Protected $table = 'users';
    Protected $fillable = ['role','name','email','password'];
}