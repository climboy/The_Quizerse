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
     var body = document.body,
         html = document.documentElement;

     var pageHeight = Math.max( body.scrollHeight, body.offsetHeight,
                            html.clientHeight, html.scrollHeight, html.offsetHeight );

     btn.style.position = "absolute";
     var tl = new TimelineLite();
     document.body.style.overflow = "hidden";
     var tween = TweenMax.to(btn, 0.4, {top: btn.offsetTop - 60, ease: Expo.easeIn}),
      tween2 = TweenMax.to(btn, 0.5, {top: pageHeight, ease: Expo.easeOut,
      onComplete: function() {
        btn.style.display = "none";
      }});
     tl.add(tween, 0);
     tl.add(tween2, 0.5);
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
