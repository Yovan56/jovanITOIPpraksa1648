<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="js/jquery-3.7.1.js"></script>
	<script>
		$(document).ready(function() {
			
			$("#forma").submit(function (e) {
			   	e.preventDefault();
			   	var form = $(this);
			   	var ime = form.find("[name='ime']").val();
			   	var prezime = form.find("[name='prezime']").val();
			   	var naslov = form.find("[name='naslov']").val();
			   	var mejl = form.find("[name='mejl']").val();
			   	var poruka = form.find("[name='poruka']").val();
			    $.ajax({
			    	url: form.attr('action'),
			    	method: form.attr('method'),
			    	data:{
			    		'ime':ime,
			    		'prezime':prezime,
			    		'naslov':naslov,
			    		'mejl':mejl,
			    		'poruka':poruka
			    	},
			    	success:function(odgovor){
			    		console.log('success');
			    	},
			    	error:function(){
			    		console.log('error');
			    	}

			    });
			   	
			});
		});
	</script>
</head>
<body>

<div id ="divForma">
<form id = "forma" action = "logika/posaljimejl.php"method="post">
	<input type="text" name="ime" placeholder="ime" required><br>
	<input type="text" name="prezime" placeholder="prezime" required><br>
	<input type="text" name="naslov" placeholder="naslov" required><br>
	<input type="text" name="mejl" placeholder="mejl" required><br>
	<textarea id="poruka" name="poruka" rows="4" cols="20" placeholder="poruka" required></textarea><br>
	<input type="submit" name="submit">

</form>
</div>
<style type="text/css">
	body{
		background-color:gold;
	}
	div{
		width: 100%;
		margin-top:30vh ;
		display: flex;
	}
	form{
		margin: auto;
		border:1px black solid;
	}
</style>
</body>
</html>