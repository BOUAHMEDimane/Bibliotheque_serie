<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
      
    public function index(){
        $series = DB::table('users')->leftJoin('series', 'series.author_id', '=', 'users.id')
            ->orderByDesc('series.date')->get('*')->forPage(1,3);
        return view('welcome', compact('series'));
    }
}
