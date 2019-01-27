@extends('layouts/app')
@section('content')

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
        
        console.log(JSON.stringify(query));
        $.ajax({	
            url:"/searchMovies",
            type:"get",
            contentType: "application/json",
            data:query,
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
    
$(".square_btn").click(function(){
    e.preventDefault();
    $.ajax({
        url:"/rateMovies",
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