<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    /**
     * Updatable Locality attributes 
     * @var array
     */
    protected $fillable = ['postal_code', 'locality'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'localities';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;
}
