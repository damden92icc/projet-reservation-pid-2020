<?php

namespace App\Http\Middleware;

use App\User;
use App\Role;
use App\RoleUser;



use Closure;

class VerifyAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     
        // Get the id of the name role
        $t = Role::where('role', 'admin')->first();
        // Get current user ID
        $userID = $request->user()->id;

        // Check in the table role_user if user is register as admin
        $currentUser = RoleUser::where('user_id' , $userID )->where('role_id', $t->id)->first();
   
     //  dd($currentUser . ' '. $t. ' ' . $userID);

        if($currentUser != null ){
            return $next($request);
        }

         return redirect()->route('home');
    }
}
