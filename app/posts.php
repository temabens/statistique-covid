<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;

class posts extends Model
{
	   use softdeletes;

   protected $fillable =['titre','content','wilaya_id','source_id','profession_id','malade_id','image' ];

	public function wilaya(){
		return $this->belongsTo('App\wilaya');
	}
	public function source(){
		return $this->belongsTo('App\sources');
	}
	public function profession(){
		return $this->belongsTo('App\professions');
	}
	public function malade(){
		return $this->belongsTo('App\malades');
	}
    

          public function tags(){
            return $this->belongsToMany('App\Tags');}

}

