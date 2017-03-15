<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <meta charset="utf-8">
    <title>The Quizerse</title>
  </head>
  <body id="background">
    <h1>The Quizerse</h1>
   <div class="push">
     <a class="btn icon-btn btn-default" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-play img-circle text-muted"></span> <!-- defining icon -->
     Jouer<!-- defining text -->
     </a>
     <a class="btn icon-btn btn-primary" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-list-alt img-circle text-primary"></span>
     Score
     </a>
     <a class="btn icon-btn btn-warning" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-star img-circle text-warning"></span>
     Badge
     </a>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
   <script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous"></script>

   <script type="text/javascript">
	function clickButton(btn) {
		var otherBtns = $(btn).closest('.push').find('.btn').not($(btn));
		otherBtns.each(function(ind, el) {
			$(el).css({
				'top': el.offsetTop,
				'left': el.offsetLeft
			});
		});
		$(btn).css({
			'top': btn.offsetTop,
			'left': btn.offsetLeft
		});
		otherBtns.css('position', 'absolute');
		$(btn).css('position', 'absolute');

     
		var tl = new TimelineLite();
		
		var tween = TweenMax.to(btn, 0.2, {
			top: btn.offsetTop - 60,
			ease: Power2.easeOut
		}),
		tween2 = TweenMax.to(btn, 0.5, {
			top: $(window).height(),
			ease: Power2.easeIn,
			onComplete: function() {
				$(btn).hide();
			}
		});
		tl.add(tween, 0);
		tl.add(tween2, 0.2);
		
		otherBtns.each(function(ind, el) {
			var tween = TweenMax.to(el, 0.5, {
				top: $(window).height() + (ind * $(window).height() * 0.6),
				ease: Power2.easeIn,
				onComplete: function() {
					$(el).hide();
				}
			});
			tl.add(tween, 0.25 + (ind * 0.05));
		});
   }
   </script>

   <div class="push">
     <a class="btn icon-btn btn-primary" style="display:none" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-list-alt img-circle text-primary"></span>
     Jouer par thèmes
     </a>
     <a class="btn icon-btn btn-warning" style="display:none" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-star img-circle text-warning"></span>
     Jouer par difficulté
     </a>
   </div>
  </body>
</html>
