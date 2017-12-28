<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scroll Infinity</title>
  <style>
  	.box{
  		border: 1px solid black;
  		padding: 10px;
  	}
  </style>
</head>
<body>
  <div class="container">
  	<div id="content"></div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  	var oset = 0;
  	var iload = 1;
  	var holdload = false;

  	$(function(){
  		loadArt(4);
  	});

  	$(window).scroll(function() {
  		if($(window).scrollTop() >= $(document).height() - $(window).height() - 100){
  			loadArt(1);
  		}
  	});

  	function loadArt(limt){
  		if(!holdload){
  			var holder = {oset: oset, iload: limt}
	  		holdload = true;
	  		$.ajax({
	  			url: "api.php",
	  			type: "POST",
	  			data: {'oset': oset, 'iload': limt},
	  			dataType: "json",
	  			success:function(data){
	  				for (var i = 0; i < data.content.length; i++) {
	  					oset++;
	  					var item = data.content[i];
	  					var html = '<div class="box">' + 
	  						item.id + 
	  						'' + 
	  						item.content + 
	  						'' + 
	  						item.date + 
	  						'</div>';
	  					$('#content').append(html);
	  				}
	  				holdload = false;
	  				if(data.content.length == 0){
	  					holdload = true;
	  				}
	  			}
	  		});
  		}
  	}
  </script>
</body>
</html>
