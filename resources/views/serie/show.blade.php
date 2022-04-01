@extends('layouts.main')

@section('content')
    <h2 class="title">{{ $project->title }}</h2>

    <div class="acteurs">{{ $serie->acteurs }}</div>
    <div class="contenu">{{ $serie->content }}</div>

    <p>
        <a href="/admin/series/{{ $serie->id }}/edit">Edit</a>
    </p>
@endsection
