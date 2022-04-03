@extends('layouts/main')
@section('content')

    <body>
        <div class="container mt-5">

            <!-- Success message -->
            @if(Session::has('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}    
            </div>
            @endif

            <form   action=" {{route('series.update',$serie->id)}}" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
            <h1><strong>Editeur Serie</strong></h1><br>

                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control  $errors->has('title') ? 'error' : '' " name="title" value="{{ $serie->title }}" id="title">

                    <!-- Error -->
                    @if ($errors->has('title'))
                    <div class="error">
                        <p>Veuillez saisir le titre de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                <label>Contenu:</label>
                <textarea class="form-control  $errors->has('content') ? 'error' : '' " name="content" value="{{ $serie->content }}"
                        id="content"
                        rows="4"></textarea>
                    
                    @if ($errors->has('content'))
                    <div class="error">
                        <p>Veuillez saisir le content de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Acteurs</label>
                    <input type="text" class="form-control  $errors->has('acteurs') ? 'error' : '' " name="acteurs" value="{{ $serie->acteurs }}" 
                        id="acteurs">

                    @if ($errors->has('acteurs'))
                    <div class="error">
                    <p>Veuillez saisir les acteur de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" class="form-control  $errors->has('tags') ? 'error' : '' " name="tags" value="{{ $serie->tags }}"
                        id="tags">

                    @if ($errors->has('tags'))
                    <div class="error">
                        $errors->first('tags') 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control  $errors->has('status') ? 'error' : '' " name="status" id="status" value="{{ $serie->status }}">
                   

                    @if ($errors->has('status'))
                    <div class="error">
                        <p>Veuillez saisir votre status</p> 
                    </div>
                    @endif
                </div>
                <input type="submit" name="send" value="Enregistré" class="btn btn-dark btn-block">
           
                
                 <a href="{{route('series.index')}}" class="btn btn-danger">Annuler</a></form>
        </div>
    </body>

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




