@extends('layouts/main')
@section('content')
<div>
    
    <h1 class="text-center  mb-2 bg-primary text-white" >BIENVENU sur le site de Biblioserie</h1>
    
    <div class=" mb-2 bg-success text-white">
        <h2>Vous pouvez Consulter les séries et ajouter si vous en souhaiter!!</h2> 
    </div>
    <div class="p-3 mb-2 bg-warning text-dark">
        <h3>avec le plaisir de recevoire tous vos précieux message dans la rubrique contacte</h3>
        <h3> On vous souhaite de passer un agreable moment sur le site</h3>
    </div>
    
    
    
</div>
@foreach($series as $serie)
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3><a href=" {{ route('series', $serie->url) }} ">{{ $serie->title }}</a></h3>  
                    <h3><small>{{ substr($serie->date, 0, 10) }}</small></h3>
                    <img class="thumbnail" src="../media/images/CCC.jpg" width="100%">
                    <p><strong>{{ $serie->content }}</strong></p>
                    <div class="callout">
                        <ul class="menu simple" aligne="center" >
                            <li>Author: {{ $serie->name }}</li>
                            <li>Note :  <i class="fa fa-star fa-1x"  data-index="1"></i> </li>
                            <li><i class="fa fa-star fa-1x"  data-index="2"></i> </li>
                            <li><i class="fa fa-star fa-1x"  data-index="3"></i> </li>
                            <li><i class="fa fa-star fa-1x"  data-index="4"></i> </li>
                            <li><i class="fa fa-star fa-1x"  data-index="5"></i> </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach


@endsection

 <!-- Annotation systéme étoile avec jQuery et ajax -->

 <?php

 if (isset($_POST['save'])){
     $conn = new sqlite('localhost', '', '', 'DB1');

     $uID = $conn->real_escape_string($_POST['uID']);
     $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
     $ratedIndex++;

     if(!$uID){
         $conn->query("INSERT INTO stars (rateIndex) VALUE ('$ratedIndex')");
         $sql = $conn->query("SELECT id FROM stars ORDER BY id desc LIMIT 1");
         $uData = $sql->fetch_assoc();
         $uID = $uData['id'];
     }else
        $conn->query("UPDATE stars SETrateIndex= '$ratedIndex' WHERE id='$uID'");

    exit(json_encode(array('id'=>$uID)));
     
 }

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
<script>
    var ratedIndex = 0, uID = 0;
    $(document).ready(function (){
        resetStarColor();

        if(localStorage.getItem('ratedIndex') != null){
            setStars(parseInt(localStorage.getItem('ratedIndex')));
            uID = localStorage.getItem('uID');
        };

        $('.fa-star').on('click', function(){
            ratedIndex= parseInt($(this).data('index'));
            localStorage.setItem('ratedIndex',ratedIndex);
            //saveToTheDB();
        });

        $('.fa-star').mouseover(function () {
            resetStarColor();
            var currentIndex = parseInt($(this).data('index'));
            setStars(currentIndex);
            
        });

        $('.fa-star').mouseleave(function () {
            resetStarColor();

            if(ratedIndex != 0)
            setStars(ratedIndex);
               
        });
    });

    function saveToTheDB () {
        $.ajax({
            url:"welcome.blade.php",
            methode: "POST",
            dataType:'json',
            data:{
                save: 1,
                uID: uID,
                ratedIndex: ratedIndex,
            }, success: function(r) {
                uID = r.uid;localStorage.setItem('uID', uID);
            }
        });

    }    
    function setStars (max) {
            for (var i = 0; i < max; i++)
                $('.fa-star:eq('+i+')').css('color','yellow');

        }

        function resetStarColor() {
        $('.fa-star').css('color', 'gray');
    }

    
</script>