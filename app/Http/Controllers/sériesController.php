<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sériesController extends Controller
{
    function index() {
        return view('series');
    }
}
