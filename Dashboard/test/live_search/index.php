<!DOCTYPE html>
<html>
<head>
	<title>JSON Live Data Searching</title>
	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<style type="text/css">
		#result{
			position: absolute;
			width: 100%;
			max-width: 870%;
			cursor: pointer;
			overflow-y: auto;
			max-height: 400px;
			box-sizing: border-box;
			z-index: 1001;
		}
		.link-class:hover{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>
	<br><br>
	<div class="container" style="width: 900px;">
		<h2 align="center">JSON Live Data Search Using Ajax Jquery</h2>
		<h3 align="center">Employee Data</h3>
		<br><br>
		<div align="center">
			<input type="text" name="search" id="search" placeholder="Search" class="form-control">
		</div>
		<ul class="list-group" id="result"></ul>
		<br>
	</div>

</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').keyup(function(){
			$('#result').html('');
			var searchField = $('#search').val();
			var expression = new RegExp(searchField, "i");
			$.getJSON('data.json', function(data){
				$.each(data, function(key, value){
					if(value.name.search(expression) != -1 || value.location.search(expression) != -1)
					{
						$('#result').append('<li class="list-group-item"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" />' +value.name+' | <span class="text-muted">'+value.location+'</span></li>');
					}
				});
			})
		});
	});
</script>
</html>