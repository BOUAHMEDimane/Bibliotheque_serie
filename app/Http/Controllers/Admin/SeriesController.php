<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
   

    function index() {
        $url = null;
        $series = DB::table('users')->leftJoin('series', 'series.author_id', '=', 'users.id')
            ->orderByDesc('series.date')->paginate(5);
        return view('series', compact('series', 'url'));
    }

    public function show($url) {
        $serie = \App\Models\Serie::where('url',$url)->first(); //get first serie with serie_nam == $serie_name
        $author_id = $serie->author_id;
        $author = DB::table('users')->where('id', $author_id)->first();
        return view('series', compact('serie', 'author', 'url'));
    }
}
