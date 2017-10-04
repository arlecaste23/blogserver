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
function del(){
var id = document.getElementById("id").innerHTML;

           $.ajax({
               type:'DELETE',
               url:'/api/articles/'+id,
		//dataType: "application/json",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
               success:function(data){
                  alert("Delete successfull!");
			window.location = "/";
               }
            });


         }
function no() {
window.location = "/delete";
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

</div>
<div id="bd" class="container w3-round w3-margin w3-center">
<p class="container-fluid w3-card w3-margin w3-center">Are you sure?</p><br>
<input type="button" value="Yes" onclick="del()"></input>
<input type="button" value="No" onclick="no()"></input>
<br><br>
<div class="w3-margin">
<p id="id"><?php echo $article->id; ?></p>
<?php	
echo base64_decode($article->title)."<br><br>";
echo base64_decode($article->body)."<br>";
?>
</div>
<div id="result"></div>
</div>
<footer class="container w3-shadow">
Powered by
<br>
Arlecaste.cc
</footer>
</center>

</body>
</htm>
