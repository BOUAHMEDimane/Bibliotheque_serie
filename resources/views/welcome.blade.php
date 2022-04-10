@extends('layouts/main')
@section('content')
<div>
    
    <h1 class="text-center  mb-2 bg-primary text-white" >BIENVENU sur le site de Biblioserie</h1>
    
    <div class=" mb-2 bg-success text-white">
        <h2>Vous pouvez Consulter les séries et ajouter si vous en souhaiter!!</h2> 
    </div>
    <div class="p-3 mb-2 bg-warning text-dark">
        <h3>avec le plaisir de recevoire tous vos précieux message dans la rubrique contacte</h3>
        <h3> On vous souhaite de passer un agreable moment sur le site</h3>
    </div>
    
    
    
</div>
@foreach($series as $serie)
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3><a href=" {{ route('series', $serie->url) }} ">{{ $serie->title }}</a></h3>  
                    <h3><small>{{ substr($serie->date, 0, 10) }}</small></h3>
                    <img class="thumbnail" src="../media/images/CCC.jpg" width="100%">
                    <p><strong>{{ $serie->content }}</strong></p>
                    <div class="callout">
                        <ul class="menu simple">
                            <h5>Autheur: <strong>{{ $serie->name }}</strong></h5>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

