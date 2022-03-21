@extends('layouts/main')
@section('content')

    <body>
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('successMsg'))
        <div class="alert alert-success">
            <p>Votre message a bien été envoyer</p>
        </div>
        @endif

        <form action="" method="post" action=" {{ route('send') }}">

        {{ csrf_field() }}

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control  $errors->has('name') ? 'error' : '' " name="name" id="name">

                <!-- Error -->
                @if ($errors->has('name'))
                <div class="error">
                     <p>Veuillez saisir votre Nom</p> 
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control  $errors->has('email') ? 'error' : '' " name="email"
                    id="email">

                @if ($errors->has('email'))
                <div class="error">
                    <p>Veuillez saisir votre adresse mail</p> 
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control  $errors->has('phone') ? 'error' : '' " name="phone"
                    id="phone">

                @if ($errors->has('phone'))
                <div class="error">
                <p>Veuillez saisir votre N° de Téléphone</p> 
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control  $errors->has('subject') ? 'error' : '' " name="subject"
                    id="subject">

                @if ($errors->has('subject'))
                <div class="error">
                     $errors->first('subject') 
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control  $errors->has('message') ? 'error' : '' " name="message" id="message"
                    rows="4"></textarea>

                @if ($errors->has('message'))
                <div class="error">
                    <p>Veuillez saisir votre message</p> 
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
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

