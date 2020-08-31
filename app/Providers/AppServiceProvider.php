<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\RoleUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //
        Blade :: if('admin', function(){
             // Get the id of the name role
            $t = Role::where('role', 'admin')->first();

           $roleUser =  RoleUser::where('user_id' ,  auth()->user()->id )->where('role_id', $t->id)->first();
    
            return  $roleUser != null;
        });
    
    }
}
