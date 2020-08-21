<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
      /**
    * Updatable attributes 
    */

    protected $fillable = [
        'slug', 'title', 'description', 'poster_url', 'location_id', 'bookable','price',
    ];

     /**
     * Related table
     */
    protected $table = 'shows';

         /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = true;

      /**
       * Get the locality of location
       */
      public function location(){
        return $this->belongsTo('App\Location');
    }

    public function representation(){
      return $this->hasMany('App\Representation');
    }

    /**
     * Get the performance artist in his a type of collobaration
     */

     public function artistType(){
       return $this->belongTo('App\ArtistType');
     }
}
