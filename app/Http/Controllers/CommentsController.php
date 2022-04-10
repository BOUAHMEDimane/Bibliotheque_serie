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

        
        //$serie = DB::table('series')->where('id ',$serie_id);
        
        //$author_Id = $serie->author_id;
        //dd($author_id);
       
        $comment = request('content');
        //dd($comment);
        $comment = request('serie_id');
        //$contact->name = $request->name;

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->author_id = $serie_id;
        $comment->serie_id= $serie_id;

        $comment->save();

        return redirect(route('comments.index'))->with('successMsg', 'Félicitation !! Votre serie a  été crée avec succé');


        



    }
}
