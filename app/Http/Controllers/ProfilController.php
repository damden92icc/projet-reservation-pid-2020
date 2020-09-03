<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    // show

    public function show(User $user){

        return view('profil.show', compact('user')
        );
        
    }

    public function edit(User $user){
            return view('profil.edit', compact('user')
        );

    }


    public function update(User $user){  
        $data = request()->validate([
            'login' => 'max:255',
            'email' => 'max:255',
            'firstname' =>'max:255',
            'lastname'=> 'max:255',
            'langue'=>  'max:2',
        ]);

       // Check if user authen 
       auth()->$user->update($data);

        $newUser = $user;

        return redirect()->route('my profil', ['user' => $user] );
    }
}
