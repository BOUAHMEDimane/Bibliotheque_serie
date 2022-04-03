@extends('layouts/main')
@section('content')
    <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3>Author: {{ $author->name }}</h3>
                    <h3>Titre : {{ $serie->title }}</h3>
                    <h3><small>Date de publication : {{ substr($serie->date, 0, 10) }}</small></h3>
                    <!--<img class="thumbnail" src="../media/images/AAA" width="100%">-->
                    <h3>Contenu</h3>
                    <p><strong>{{ $serie->content }}</strong></p>
                    <div class="callout">
                        <ul class="menu simple">
                            <li><a href="#">Comments: ......</a></li>
                        </ul>

                        
                    </div>
                    <div>
                    <a href="{{route('series.index')}}" class="btn btn-danger">Retour a la liste </a>

                    </div>
                </div>
            </div>
        </div>
        <span>
        </span>
@endsection
