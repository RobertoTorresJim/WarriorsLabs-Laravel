<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
  protected $fillable =['calle', 'colonia', 'delegacion', 'numero' ];

    public function user(){
      return $this->belongsTo('App\User');//User::class);
    }
}
