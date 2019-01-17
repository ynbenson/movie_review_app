<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>submit</title>
<style>
    
.agree_active{
    border: 1px solid #ccffcc;
    text-decoration: none;
    text-align: center;
}

#agreeBtn{
    border-radius: 4px;    
}
</style>
</head>
<body >
<p id="p1"></p>
<p id="p2"></p>
<p id="p3"></p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {
	$("#agreeBtn").click(function() {
        $(this).toggleClass('agree_active');

	var json1 = {
			  "bangou": "1",
			  "name": "鈴木"
			};
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
	$.ajax({	
		url:"/test1",
		type:"post",
		contentType: "application/json",
		data:JSON.stringify(json1),
		dataType:"json",
		}).done(function(data1,textStatus,jqXHR) {
			$("#p1").text(jqXHR.status); //例：200
			console.log(data1.code); //1
			console.log(data1.name); //eigyou
			$("#p2").text(JSON.stringify(data1));
		}).fail(function(jqXHR, textStatus, errorThrown){
			$("#p1").text("err:"+jqXHR.status); //例：404
			$("#p2").text(textStatus); //例：error
			$("#p3").text(errorThrown); //例：NOT FOUND
		}).always(function(){
		});
	});
});

function change_agree()
{
    var elem = document.getElementById("agreeBtn");
    if (elem.value==="AGREE ⤴"){
        elem.value = "AGREED";
        document.getElementById("disagreeBtn").disabled = true;
    }
    else {
        elem.value = "AGREE ⤴";
        document.getElementById("disagreeBtn").disabled = false;
    }
}

function change_disagree() 
{
    var elem = document.getElementById("disagreeBtn");
    if (elem.value==="DISAGREE ⤵") {
        elem.value = "DISAGREED";
        document.getElementById("agreeBtn").disabled = true;
    }
    else {
        elem.value = "DISAGREE ⤵";
        document.getElementById("agreeBtn").disabled = false;
    }
}
</script>
<input type="button" onclick="change_agree()" value="AGREE ⤴" id="agreeBtn">
<input type="button" onclick="change_disagree()" value="DISAGREE ⤵" id="disagreeBtn">
</html>
