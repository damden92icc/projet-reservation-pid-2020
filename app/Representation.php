<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
        /**
    * Updatable attributes 
    */

    protected $fillable = [
        'show_id', 'when',  'location_id',
    ];

     /**
     * Related table
     */
    protected $table = 'representations';

         /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;

      /**
       * Get the current location of representation
       */
      public function location(){
          return $this->belongsTo('App\Location');
      }

      /**
       * Get the show of the representation
       */

       public function show(){
           return $this->belongsTo('App\Show');
       }

       /**
        * Links to users
        */

        public function user(){
            return $this->belongsToMany('App\User');
        }
}
