<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sources extends Model
{
   protected $fillable =['name','slug'];

    protected $table = 'sources';
    
}
