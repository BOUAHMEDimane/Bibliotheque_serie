<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
   

    function index() {
        $url = null;
        $recipes = DB::table('users')->leftJoin('recipes', 'recipes.author_id', '=', 'users.id')
            ->orderByDesc('recipes.date')->paginate(5);
        return view('recettes', compact('recipes', 'url'));
    }

    public function show($serie_name) {
        $serie = \App\Models\Serie::where('serie_name',$serie_name)->first(); //get first serie with serie_nam == $serie_name
       
        return view('series/single',array( //Pass the serie to the view
            'serie' => $serie
        ));
     }
     

}
