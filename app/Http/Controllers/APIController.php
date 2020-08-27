<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function index(){
        $apiRequest = '/api/spectacles/all/search'; // Requête (OBJET = identifiant unique) 

        $start = '0'; // Debut de l'offset 

        $end = '2'; // Fin de l'offset 

        $apiKey = 'f8149e4928f19101881a781b2736c1661305c0ca'; // Clé API 

        $entryPoint = 'https://www.theatre-contemporain.net'; // Point d'entrée 
         
        // initialiser CURL et définir les options
        $apiCall = curl_init($entryPoint.$apiRequest.'?k='.$apiKey);
        $apiCallOptions = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
        );
        curl_setopt_array($apiCall, $apiCallOptions);
        
        // récupèrer les résultats
        $result =  json_decode(curl_exec($apiCall));

        // faire un print des résultats
        //echo '<pre>'.print_r($result,true).'</pre>';
        

        return view ('API.index', [
            'fetchedShow'=>  $result,
            'resource'=> 'artistes',
            ]);
    
        
      
        }


        public function getData(){
            $apiRequest = '/api/spectacles/all/search'; // Requête (OBJET = identifiant unique) 
    
            $start = '0'; // Debut de l'offset 
    
            $end = '2'; // Fin de l'offset 
    
            $apiKey = 'f8149e4928f19101881a781b2736c1661305c0ca'; // Clé API 
    
            $entryPoint = 'https://www.theatre-contemporain.net'; // Point d'entrée 
             
            // initialiser CURL et définir les options
            $apiCall = curl_init($entryPoint.$apiRequest.'?k='.$apiKey);
            $apiCallOptions = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            );
            curl_setopt_array($apiCall, $apiCallOptions);
            
            // récupèrer les résultats
            $result =  json_decode(curl_exec($apiCall));
    
            // faire un print des résultats
            //echo '<pre>'.print_r($result,true).'</pre>';

            
            foreach($result as $uniqueShow){
                print_r($uniqueShow);
            }
            
    }
}

