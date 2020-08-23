<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    // show

    public function show(User $user){

    // dd($user);

        return view('profil.show', [
            'login'=> $user['login'],
            'firstname'=> $user['firstname'],
            'lastname'=> $user['lastname'],
            'email'=> $user['email'],
            'langue'=> $user['langue'],
             ]
        );
        
    }
}
