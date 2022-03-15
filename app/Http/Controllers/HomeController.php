<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Serie;

class HomeController extends Controller
{
    function index() {
        
        
        $series = Serie::all(); //get all series
        return view('welcome',array(
            'series' => $series
        ));
 
    }
}
