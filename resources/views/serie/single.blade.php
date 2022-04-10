@extends('layouts/main')
@section('content')
    <div class="grid-x align-center mt-3">
        <div class="cell medium-8">
            <div class="blog-post">
                <h3>Author: {{ $author->name }}</h3>
                <h3>Titre : {{ $serie->title }}</h3>
                <h3><small>Date de publication : {{ substr($serie->date, 0, 10) }}</small></h3>
                <img class="thumbnail mt-5" src="../media/images/AAA.jpg" width="100%">
                <h3>Contenu</h3>
                <p><strong>{{ $serie->content }}</strong></p>
            </div>    
            <hr>
            <div>Commentaire</div>
            <form  method="post" action=" {{route('comments.store',$serie->id)}}">

            <div class="container mt-5">
                 <!-- Success message -->
                    @if(Session::has('successMsg'))
                    <div class="alert alert-success">
                        {{ session('successMsg') }}    
                    </div>
                    @endif

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Votre commentaire</label>
                            <textarea class="form-control  $errors->has('content') ? 'error' : '' " name="content" id="content"
                            rows="4"></textarea>
                            @if ($errors->has('content'))
                            <div class="error">
                                <p>Veuillez saisir votre commentaire</p> 
                            </div>
                            @endif
                            
                        </div>
                        <input type="submit" name="send" value="Submit" class="btn btn-primary ">
                        <div>
                            <div>
                            <h3>liste des commantaires</h3>
                            </div>
                            @foreach($comments as $comment)
                            <ul>  
                                <li>{{$comment->content}}</li>
                            </ul>
                            @endforeach
                        </div>
                    
                    </form>
                </div>

                
    </div>
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