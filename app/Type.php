<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Updatable type attributes 
     * @var array
     */
    protected $fillable = ['type'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'types';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;


      /**
       * Artist defined by the type
       */

       public function artists(){
           return $this->belongsToMany('App\Artist');
       }
}
