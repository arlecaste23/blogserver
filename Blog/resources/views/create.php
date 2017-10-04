<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<meta charset="utf-8">
<script type="text/javascript" src="{{URL::asset('assets/js/script.js')}}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html, body {
	width: 100%;
	height:100%;
	Background-Color: #FAFBFCF0;
}
</style>
<script type="text/javascript" src="js/script.js"></script>
<script>
function reset() {
	document.getElementById("title").value = "";
	document.getElementById("content").value = "";
}

function b64EncodeUnicode(str) {
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
        return String.fromCharCode('0x' + p1);
    }));
}
function save(){
console.log("Saving...");
var tt = document.getElementById("title").value;
var bb = document.getElementById("content").value;

console.log(tt);
console.log(bb);

var bt = b64EncodeUnicode(tt);
var bbb = b64EncodeUnicode(bb);

/*
	Mi collego alle api
*/
            $.ajax({
               type:'POST',
               url:'/api/articles',
		//dataType: "application/json",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
               data: "title="+bt+"&body="+bbb,
               success:function(data){
                  alert("Article created!");
			window.location = "/";
               }
            });
         }
</script>
</head>
<body>

<center>
<header class="w3-panel">

<a href="/"><h1 style="text-shadow:2px 2px 0 #444">Interests</h1></a>

</header>
<div>
<a style="background-color: rgba(<?php echo rand(0,255).','.rand(0,255).','.rand(0,255)?>,0.1);" href="/home" class="w3-margin w3-panel w3-display-topright w3-button w3-margin-bottom w3-card w3-round">Account</a>
<a href="/create" class="w3-round w3-button w3-green" value="create">Create</a>
<a href="/update" class="w3-round w3-button w3-blue" value="create">Update</a>
<a href="/delete" class="w3-round w3-button w3-red" value="create">Delete</a>
<br>
</div>
<div class="container">
<p class="w3-margin-top w3-center">Title:</p>
<input id="title" style="text-align:center;background-color: rgba(0,<?php echo rand(50,255)?>,0,0.1);" class="w3-input w3-card w3-margin" type="text" size="35" placeholder='Title here'></input>
<br>
Body:
<br>
 <textarea id="content" style="background-color: rgba(0,<?php echo rand(50,255)?>,0,0.1);" class="w3-input w3-card w3-margin" rows="7" cols="50" placeholder='Insert the content here...'>
</textarea> 
<input class="w3-button w3-green w3-round" type="button" value="Save" onclick="save()"></input>
<input class="w3-button w3-red w3-round" type="button" value="Reset" onclick='reset();'></input>
</div>
<footer class="w3-margin">
Powered by
<br>
Arlecaste.cc
</footer>
</center>

</body>
</htm>
