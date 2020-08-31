<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'firstname', 'lastname', 'langue', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * link to roles
     */
    public function userRole(){
        return $this->belongsToMany('App\Role');
    }

    /**
     * link to representations
     */

     public function representation(){
            return $this->belongsToMany('App\Representation');
     }

     /**
      * function to return all user profil when login is provided
      * used for profil page
      */
    
      public function getRouteKeyName(){
          return 'login';
      }
}
