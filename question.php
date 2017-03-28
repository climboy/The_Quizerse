<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/question.css">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <title>Question</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			// set transform origin to top left
			TweenMax.set('.container', {
				visibility: "visible",
				scale: 0,
				transformOrigin:"50% 50%"
			}); 
			// since scaleX and scaleY are the same you can just use scale
			TweenMax.to('.container', 1, {scale:1}); 
		});
    </script>
  </head>
  <body>
	<div class="container">
	  <p>Question 1</p>
	</div>
  </div>
  </body>
</html>
