<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistTypeShow extends Model
{
    /**
     * Updatable Artist attributes 
     * @var array
     */
    protected $fillable = ['artist_type_id', 'show_id'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'artist_type_show';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;

      /**
       *  Get the show of the performance 
       * doc : https://laravel.com/docs/7.x/eloquent-relationships#one-to-many-inverse
       */

       public function show(){
           return $this->belongsToMany('App\Show', 'artist_type_shows');
       }

       /**
        * get the artiste cncerned by this association
        */
       
        public function artist(){
            return $this->belongsTo('App\Artist');
        }

       /**
        * Get the type for this association
        */
        
        public function type(){
            return $this->belongsTo('App\Type');
        }

      
}
