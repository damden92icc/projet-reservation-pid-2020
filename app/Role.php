<?php

namespace App;
use App\User;

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

      public function role(){
            return $this->belongsToMany('App\User');
      }

}
