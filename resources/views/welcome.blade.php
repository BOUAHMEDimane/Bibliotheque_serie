@extends('layouts/main')
@section('content')
<div>
    <h1 class="text-justify" >BIEN VENU sur le site de Biblioserie</h1>
    <h2>Vous pouvez Consulter les séries et ajouter si vous en souhaiter!!</h2>
    <h3>avec le plaisir de recevoire tous vos précieux message dans la rubrique contacte</h3>
    <h3> On vous souhaite de passer un agreable moment sur le site</h3>
</div>
@foreach($series as $serie)
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3><a href=" {{ route('series', $serie->url) }} ">{{ $serie->title }}</a></h3>  
                    <h3><small>{{ substr($serie->date, 0, 10) }}</small></h3>
                    <p><strong>{{ $serie->content }}</strong></p>
                    <div class="callout">
                        <ul class="menu simple">
                            <li><a href="#">Author: {{ $serie->name }}</a></li>
                            <li><a href="#">Comments: </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

