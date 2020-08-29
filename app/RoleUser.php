<?php

namespace App;
use App\Role;
use App\User;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * Updatable Artist attributes 
     * @var array
     */
    protected $fillable = ['user_id', 'type_id'];

    /**
     * Association with the modele
     * @var string
     */

     protected $table = 'role_user';

     /**
      * Model timestamped : off
      * @var bool
      */

      public $timestamps = false;

     

       /**
        * get the artiste cncerned by this association
        */
       
        public function user(){
            return $this->belongsTo('App\User');
        }

       /**
        * Get the type for this association
        */
        
        public function role(){
            return $this->belongsTo('App\Role');
        }

      
}
