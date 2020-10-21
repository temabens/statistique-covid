<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professions extends Model
{
    protected $fillable =['name','slug'];

    protected $table = 'professions';
}
