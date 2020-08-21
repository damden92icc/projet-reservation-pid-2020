<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
    * Updatable attributes 
    */

    protected $fillable = [
        'slug', 'designation', 'address', 'locality_id', 'website', 'phone',
    ];

    /**
     * Related table
     */
    protected $table = 'locations';

         /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;

      /**
       * Get the locality of location
       */

       public function locality(){
           return $this->belongsTo('App\Locality');
       }

       public function shows(){
           return $this->hasMany('App\Show');
       }

       public function reprensetation(){
           return $this->hasMany('App\Representation');
       }
}
