@extends('layouts.main')
@section('content')
    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
        </div>
    @endif
    <div>
        <h2>Liste des série</h2>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            {{$series ->links()}}    
            <div>
                <a href="{{route('series.create')}}" class="btn btn-primary">Ajouter une nouvelle serie</a>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Series</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date de Sortie</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                    <tr>
                        <th scope="row">{{ $serie->id }}</th>
                        <td>{{ $serie->title }}</td>
                        <td>{{ $serie->name }}</td>
                        <td>{{ substr($serie->date, 0, 10) }}</td>
                        <td>
                        <a href="{{route('series.show', $serie->id)}}" class="btn btn-success">Consulter</a>
                        <a href="{{route('series.edit', $serie->id)}}" class="btn btn-info">Editer</a>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez vous vraiment supprimer cet série?')){document.getElementById('form-{{$serie->id}}').submit()}" >Supprimer</a>
                        <form id= "form-{{$serie->id}}"action="{{route('series.destroy', $serie->id)}}" method="post">
                            @csrf                           
                            <input type="hidden" name="_method" value="DELETE"> 
                               
                        </form>
                        
                        </td>                  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
