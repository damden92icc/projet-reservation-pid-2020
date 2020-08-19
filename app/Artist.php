<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * Updatable Artist attributes 
     * @var array
     */
    protected $fillable = ['firstname', 'lastname'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'artists';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;

}
