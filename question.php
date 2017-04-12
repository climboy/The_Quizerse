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
			// fonction permettant de zoomer le contenaire //
			TweenMax.set('.container', {
				visibility: "visible",
				scale: 0,
				transformOrigin:"50% 50%"
			});
			// scale de 1 sur l'élément //
			TweenMax.to('.container', 1, {scale:1, onComplete: function(){
        showbuttons('#question');
      }});
		});


    function showbuttons(question) {
      var Btns = $(question);
      Btns.show();
      Btns.each(function(ind, el) {

        $(el).data('left', $(el).position().left);
        $(el).data('top', el.offsetTop);
        $(el).css({
          'left': -100,
          'top': el.offsetTop,
        });


      });
    Btns.css('position', 'absolute');
    Btns.each(function(ind, el) {
      var tween = TweenMax.to(el, 0.5, {
        left: $(el).data('left'),
        ease: Power2.easeOut
      })
    });
    console.log(Btns);
    }

    </script>
  </head>
  <body>
	<div class="container">
	  <p>Question 1</p>
	</div>
  <div id="question" style="display:none">
    <p>Quel est mon âge ?</p>
    <button class="btn icon-btn btn-warning" type="button" name="button" onclick="clickButton(this); return false;">18</button>
    <button class="btn icon-btn btn-warning" type="button" name="button" onclick="clickButton(this); return false;">34</button>
    <button class="btn icon-btn btn-warning" type="button" name="button" onclick="clickButton(this); return false;">23</button>
  </div>
  <script type="text/javascript">

  </script>
  </body>
</html>
