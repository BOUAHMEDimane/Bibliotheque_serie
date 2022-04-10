<?php

namespace App\Http\Controllers;

use App\Models\Comment;

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
       
        $author_Id = $serie->author_id;
        $serie_id = $serie->id;
        
        
        //$image = DB::table('images')->where('serie_id',$serie->id)->first();
        //$imagee = $image->path;
        
        $author = DB::table('users')->where('id', $author_Id)->first(); 
        
        //récupéré les commentaire de la série qui correcpond a cette le $url 
        $comments = DB::table('comments')->where('serie_id', $serie_id)->get();
        //dd($comments);
        

        return view('serie/single', compact('serie', 'author', 'comments' ));
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
