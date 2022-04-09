<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
   
    /****afficher la liste des series*****/
    function index() {
        $url = null;
        $series = DB::table('users')->leftJoin('series', 'series.author_id', '=', 'users.id')
        ->orderByDesc('series.date')->paginate(5);
        
        return view('series', compact('series', 'url'));
    }

    /****afficher une seul  serie*****/
    public function show($url) {
        
        $serie = DB::table('series')->where('url',$url)->first(); //get first serie with url == $url
        $author_id = $serie->author_id;
        
        $image = DB::table('images')->where('serie_id',$serie->id)->first();
        $imagee = $image->path;
        
        $author = DB::table('users')->where('id', $author_id)->first();
        
        return view('serie/single', compact('serie', 'author', 'image'));
    }
    
    /****afficher la liste des series saisie dans la barre de recherche*****/
    //to do
    public function search() {
        $search = request()->input('search');
        $series = DB::table('series')->where('series.url', '=', "%$search%")
            ->orderByDesc('series.date')->paginate(5);
        
        return view('search', compact('series'));
    }
        

}
