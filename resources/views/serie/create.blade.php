@extends('layouts.main')

@section('title','Serie - Create')

@section('content') 

    <body>
        <div >

            <!-- Success message -->
            @if(Session::has('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}    
            </div>
            @endif

            <form  method="post" action="{{route('series.store')}}">

            {{ csrf_field() }}

                <div class="form-group">
                    <label>Titre de la série</label>
                    <input type="text" class="form-control  $errors->has('title') ? 'error' : '' " name="title" id="title">

                    <!-- Error -->
                    @if ($errors->has('title'))
                    <div class="error">
                        <p>Veuillez saisir le titre de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nom de l'auteur</label>
                    <input type="text" class="form-control  $errors->has('author_name') ? 'error' : '' " name="author_name"
                        id="author_name">

                    @if ($errors->has('author_name'))
                    <div class="error">
                        <p>Veuillez saisir le nom de l'auteur'</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Acteurs</label>
                    <input type="text" class="form-control  $errors->has('acteurs') ? 'error' : '' " name="acteurs"
                        id="acteurs">

                    @if ($errors->has('acteurs'))
                    <div class="error">
                    <p>Veuillez saisir les acteurs de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Contenu</label>
                    <textarea type="text" class="form-control  $errors->has('content') ? 'error' : '' " name="content"
                        id="content" rows="4"></textarea>

                    @if ($errors->has('content'))
                    <div class="error">
                    <p>Veuillez saisir le contenu de la série</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>date</label>
                    <input type = "date" class="form-control  $errors->has('date') ? 'error' : '' " name="date" id="date"
                        >

                    @if ($errors->has('date'))
                    <div class="error">
                        <p>Veuillez saisir la date</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control  $errors->has('status') ? 'error' : '' " name="status"
                        id="status">

                    @if ($errors->has('status'))
                    <div class="error">
                    <p>Veuillez saisir le status</p> 
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <textarea class="form-control  $errors->has('tags') ? 'error' : '' " name="tags" id="tags"
                        rows="2"></textarea>

                    @if ($errors->has('tags'))
                    <div class="error">
                        <p>Veuillez saisir votre tags</p> 
                    </div>
                    @endif
                </div>
                
                <div class="mb-3">
                 <label for="exampleInputid" class="form-label ">Photo de couverture de la serie </label>
                 <input type="file" name="image" class="form-control " accept="image/jpg, image/png, image/jpeg" >
                </div>

                <input type="submit" name="send" value="Enregistrer" class="btn btn-primary btn-block">
           
                
                <a href="{{route('series.index')}}" class="btn btn-danger btn-block">Annuler</a>

           
            </form>
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



