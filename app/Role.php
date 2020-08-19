<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     /**
     * Updatable role attributes 
     * @var array
     */
    protected $fillable = ['role'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'roles';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;
}
