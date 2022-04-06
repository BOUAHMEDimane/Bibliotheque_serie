@extends('layouts/main')
@section('content')
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

