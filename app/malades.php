<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class malades extends Model
{
     protected $fillable =['name','slug'];

    protected $table = 'malades';
}
