<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return 'a propos de ce site web';
    }

    public function contact(){
        return 'Prenez contact avec nous !';
    }
}
