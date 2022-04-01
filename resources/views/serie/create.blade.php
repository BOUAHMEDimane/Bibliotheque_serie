@extends('layouts.main')

@section('title','Serie - Create')

@section('content') 
  

    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
            <h2>aaa</h2>
        </div>
    @endif

    <h2>Créer une nouvelle serie</h2>
    <form method="post" action="{{route('serie.add')}}">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleInputtitle" class="form-label" >Titre</label>
            <input type="text" class="form-control $errors->has('title') ? 'error' : '' " placeholder="Titre de la serie..."  name="title" id="title" required>
            
            <!-- Error -->
            @if ($errors->has('title'))
                <div class="error">
                    <p>Veuillez saisir le titre de la série</p> 
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="exampleInputauteur" class="form-label">Nom de l'auteur </label>
            <input type="text" class="form-control $errors->has('author_name') ? 'error' : '' " placeholder="Nom de l'auteur..."  name="author_name" id="author_name" required>
            
            <!-- Error -->
            @if ($errors->has('author_name'))
                <div class="error">
                    <p>Veuillez saisir le nom de l'auteur</p> 
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputid" class="form-label">Acteurs </label>
            <input type="text" class="form-control $errors->has('acteurs') ? 'error' : '' " placeholder="les acteur de la série..." name="acteurs" id="acteurs" required>
            @if ($errors->has('acteurs'))
                <div class="error">
                    <p>Veuillez saisir le nom de l'auteur</p> 
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputid" class="form-label">Contenu </label>
            <input type="text" class="form-control $errors->has('content') ? 'error' : '' " placeholder="Contenu de la serie..." name="content" id="content" required >
            @if ($errors->has('content'))
                <div class="error">
                    <p>Veuillez saisir le contenu de la série</p> 
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputDate" class="form-label">Date de sortie </label>
            <input type="date" class="form-control $errors->has('date') ? 'error' : '' " name="date" id="date" required >
            @if ($errors->has('date'))
                <div class="error">
                    <p>Veuillez saisir la date </p> 
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputtags" class="form-label">Tags </label>
            <input type="text" class="form-control " >
        </div>
        <div class="mb-3">
            <label for="exampleInputid" class="form-label ">Photo de couverture de la serie </label>
            <input type="file" name="image" class="form-control " accept="image/jpg, image/png, image/jpeg" required>
        </div>
        <button type="submit" name="send" class="btn btn-primary">Enregistrer</button>
        <a href="{{route('serie.crud')}}" class="btn btn-danger">Annuler</a>

</form>

   

<style>
        .container {
        max-width: 500px;
        margin: 50px auto;
        text-align: left;
        font-family: sans-serif;
        }

        form {
        border: 1px solid #1A33FF;
        background: #ecf5fc;
        padding: 40px 50px 45px;
        }

        .form-control:focus {
        border-color: #000;
        box-shadow: none;
        }

        label {
        font-weight: 600;
        }

        .error {
        color: red;
        font-weight: 400;
        display: block;
        padding: 6px 0;
        font-size: 14px;
        }

        .form-control.error {
        border-color: red;
        padding: .375rem .75rem;
        }
    </style>


@endsection
