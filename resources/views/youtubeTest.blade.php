@extends('layouts/app')
@section('content')

<style>
    .video-container{
        text-align: center;
    }

    .square_btn{
        display: inline-block;
        padding: 0.5em 1em;
        background: #f7f7f7;
        border-left: solid 6px #ff7c5c;/*左線*/
        color: #ff7c5c;/*文字色*/
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
    }

    .square_btn:active {
        box-shadow: inset 0 0 2px rgba(128, 128, 128, 0.1);
        transform: translateY(2px);
    }

    .btn_exc {
        background: #f7f7f7;
        border-left: solid 6px #009900;/*左線*/
        color: #009900;/*文字色*/
    }

    .btn_great {
        background: #f7f7f7;
        border-left: solid 6px #66ccff;/*左線*/
        color: #66ccff;/*文字色*/
    }

    .btn_ok {
        background: #f7f7f7;
        border-left: solid 6px gray;/*左線*/
        color: gray;/*文字色*/
    }

    .btn_poor {
        background: #f7f7f7;
        border-left: solid 6px #ff7c5c;/*左線*/
        color: #ff7c5c;/*文字色*/
    }        

    .btn_awful {
        background: #f7f7f7;
        border-left: solid 6px #ff3333;/*左線*/
        color: #ff3333;/*文字色*/
    }
    
    #outer
    {
        width:100%;
        text-align: center;
    }

    .inner
    {
        display: inline-block;
        margin: 5px 30px 5px 30px;
    }
</style>

<div>
    Find Movie: <input class="search" type="search" id="q" name="q" placeholder="Enter Search Term">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $(".search").keypress(function(e){
        if(e.which == 13){
            var query = {
                "youtube_query": $(".search").val(),
            };

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $.ajax({	
                    url:"/test1",
                    type:"post",
                    contentType: "application/json",
                    data:JSON.stringify(query),
                    dataType:"json",
                    }).done(function(data1,textStatus,jqXHR) {
                        $url = "https://www.youtube.com/embed/" + data1.youtube_id;
                        $("#video").attr("src",$url);

                        $(document).ready(function(){
                            $(".inner").show("15000");
                        });
                    }); 
        }
    });
</script>

<div class="video-container">
    <iframe id="video" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<div id="outer">
    <div class="inner" style="display:none">
        <button type='submit' class='square_btn btn_exc' name='btn' value='exc'>Excellent</button>
    </div>
    <div class="inner" style="display:none">
        <button type='submit' class='square_btn btn_great' name='btn' value='great'>Great</button>
    </div>
    <div class="inner" style="display:none">
        <button type='submit' class='square_btn btn_ok' name='btn' value='ok'>OK</button>
    </div>
    <div class="inner" style="display:none">
        <button type='submit' class='square_btn btn_poor' name='btn' value='poor'>Poor</button>
    </div>
    <div class="inner" style="display:none">
        <button type='submit' class='square_btn btn_awful' name='btn' value='awful'>Awful</button>
    </div>
</div>
@endsection