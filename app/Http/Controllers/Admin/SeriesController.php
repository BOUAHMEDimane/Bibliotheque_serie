<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = DB::table('users')->leftJoin('series', 'series.author_id', '=', 'users.id')
        ->orderBy('series.id')->paginate(10);
        return view('serie.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'author_name'=>'required',
            'acteurs'=>'required',
            'content'=>'required',
            'date'=>'required',
            'tags'=>'required',
        ]);


        $author_name = request('author_name');
        $author_id = DB::table('users')->where('name',$author_name)->value('id');
        
        $serie = new Serie();
        $serie->author_id = $request->$author_id;
        $serie->title = $request->title;
        $serie->content = $request->content;
        $serie->acteurs = $request->acteurs;
        $serie->url = $request->title;
        $serie->tags = $request->tags;
        $serie->status = $request->status;
        $serie->date = date('Y-m-d H:i:s');
        
        $serie->save();
        return redirect(route('series.create'))->with('successMsg', 'Félicitation !! Votre serie a  été crée avec succé');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $serie = Serie::where($id)->first(); //get first serie with serie_nam == $serie_name
        $author_id = $serie->author_id;
        $author = DB::table('users')->where('id', $author_id)->first();
                
        return view('serie.show', compact('serie', 'author'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = DB::table('series')->find($id);
        return view('serie.edit', compact('serie'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'acteurs'=>'required',
            'tags'=>'required'
        ]);

        $serie = Serie::find($id);
        $serie->title = request('title');
        $serie->content = request('content');
        $serie->acteurs = request('acteurs');
        $serie->tags = request('tags');
        $serie->save();
        return redirect(route('series.index'))->with('successMsg', 'Félicitation !! Votre serie a  été modifier avec succé');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::find($id);
        $serie->delete();
        //return redirect(route('create'));
        return redirect(route('series.index'))->with('successMsg', ' Votre serie a  été  supprimé avec succé');
  
    }

    public function addComment(Request $request, $url) {

        $this->validate($request,[
            'author_name'=>'required',
            'comment'=>'required',
        ]);


        $serie_id = DB::table('series')->where('url',$url)->value('id');
        $author_name = request('author_name');
        $comment = new Comment();
        $author_id = DB::table('users')->where('name',$author_name)->value('id');
        $count = DB::table('users')->where('name',$author_name)->count();
        if($count > 0) {
            $comment->author_id = $author_id;
        } else {
            $comment->author_id = 0;
        }
        
        $comment->serie_id = $serie_id;
        $comment->content = request('comment');
        $comment->date = date('Y-m-d H:i:s');
        $comment->save();

        return redirect(url('/series/'.$url));
    }
}
