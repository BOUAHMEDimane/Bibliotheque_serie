<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    function index() {
        return view('serie/single');
    }

    public function store(Request $request)
    {
        request()->validate([
            'content' => 'required|min:5'
        ]);

        $serie_id = request('id');
        //dd($serie_id);

        $serie = Serie::find($serie_id);
        $author_Id = $serie->author_id;
        $url = $serie->title;
        //dd($url);
        
        
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->author_id = $author_Id;
        $comment->serie_id= $serie_id;
         
        $comment->save();
        
       

        return redirect(route('serie', $url))->with('successMsg', ' Votre commentaire a  été enregistré avec succé');


        



    }
}
