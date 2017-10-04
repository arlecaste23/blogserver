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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html, body {
	width: 100%;
	height:100%;
	Background-Color: #FAFBFCF0;
}
</style>
<script>

</script>
</head>
<body>

<center>
<header class="w3-panel">
<a href="/"><h1 style="text-shadow:2px 2px 0 #444">Interests</h1></a>

</header>
<div>
<a style="background-color: rgba(<?php echo rand(0,255).','.rand(0,255).','.rand(0,255)?>,0.1);" href="/home" class="w3-margin w3-panel w3-display-topright w3-button w3-margin-bottom w3-card w3-round">Account</a>
<?php
	echo "<div class='container w3-card'>Hello ".$user->name.", che cosa vuoi fare?<br></div><br>";
?>
<a href="/create" class="w3-round w3-button w3-green" value="create">Create</a>
<a href="/update" class="w3-round w3-button w3-blue" value="create">Update</a>
<a href="/delete" class="w3-round w3-button w3-red" value="create">Delete</a>
<br>

</div>
<div class="container w3-round w3-margin">
<?php
use App\Article;

 $tt = DB::select('select id, title, body from articles');
	foreach($tt as $ts) {
		$ttmp = base64_decode($ts->title);
		$tbody = base64_decode($ts->body);

		$tt = $ts->title;
		$bb = $ts->body;
		$id = $ts->id;
	echo "<div id='".$id."' class='w3-card-2 container w3-panel' style='background-color: rgb(".rand(0,255).", ".rand(0,255).",".rand(0,255).", 0.3);'>
		<h3>$ttmp</h3><br>
		$tbody<br><br>
		</div>";
	}

?>
</div>
<footer class="container w3-shadow">
Powered by
<br>
Arlecaste.cc
</footer>
</center>
<script>
function randomrgb() {
	return Math.floor((Math.random() * 255));
}
function color(){
var text;
            $.ajax({
               type:'GET',
               url:'/api/articles',
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
               success:function(data){
			
			for(var i = 0; i<data.length; i++) {
				text = document.getElementById(data[i].id);
				text.style.backgroundColor = 'rgba(' + randomrgb() +', '+randomrgb()+', '+randomrgb()+', '+0.2+')';
			}
               }
            });
         }
color();
</script>
</body>
</htm>
