<!DOCTYPE html>
<html>
  <head>
    <!--<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <meta charset="utf-8">
    <title>The Quizerse</title>
  </head>
  <body>
    <div id="background">
    <h2>The Quizerse</h2>
    <div id="table">
        <a class="table-button" href="#">
        Jouer</a>
        <img src="images/table.svg" width="768" height="321" alt="table de jeu du joueur" />
    </div>

    <div class="button-flex btnf-acc">
        <a class="btn-accueil btn-badge" href="#">
        Badges
        </a>
        <a class="btn-accueil btn-score" href="#">
        Score
        </a>
    </div>

    <div id="table2" class="dontshow">
        <div class="button-flex">
            <a class="btn-choice btn-theme" href="#">
            Par Thème
            </a>
            <a class="btn-choice btn-lvl" href="#">
            Par difficulté
            </a>
        </div>
        <img src="images/table2.svg" width="768" height="321" alt="table de jeu du joueur" />
    </div>

    <div id="table3" class="dontshow">
        <div class="button-flex">
            <a class="btn-game btn-theme" href="question.php?id_theme=1">
            Culture Générale
            </a>
            <a class="btn-game btn-lvl" href="question.php?id_theme=2">
            Culture Numérique
            </a>

            <a class="btn-game btn-theme" href="question.php?id_theme=3">
            Technologies du Web
            </a>
        </div>
        <img src="images/table2.svg" width="768" height="321" alt="table de jeu du joueur" />
    </div>

    <div id="table4" class="dontshow">
        <div class="button-flex">
            <a class="btn-game btn-theme" href="question.php?id_difficulte=1">
            Facile
            </a>
            <a class="btn-game btn-lvl" href="question.php?id_difficulte=2">
            Moyen
            </a>

            <a class="btn-game btn-theme" href="question.php?id_difficulte=3">
            Difficile
            </a>
        </div>
        <img src="images/table2.svg" width="768" height="321" alt="table de jeu du joueur" />
    </div>

      <div id="perso">
          <img id="men" src="images/persos/anim.png" />
      </div>

    <script type="text/javascript">
        // Déclaration des variables
        var ecranAccueil = document.querySelector('#table');
        var ecranAccueil2 = document.querySelector('.btnf-acc');
        var ecranJouer = document.querySelector('#table2');
        var ecranTheme = document.querySelector('#table3');
        var ecranNiveau = document.querySelector('#table4');

        var btnJouer = document.querySelector('.table-button');
        var btnTheme = document.querySelector('#table2 .button-flex .btn-theme');
        var btnNiveau = document.querySelector('#table2 .button-flex .btn-lvl');

        // Ajout d'un écouteur d'évenements au boutons
        btnJouer.addEventListener('click', accToJouer );
        btnTheme.addEventListener('click', jouerToTheme );
        btnNiveau.addEventListener('click', jouerToNiveau );

        // Déclaration des fonctions
        function accToJouer(){
            ecranAccueil.classList.add('dontshow');
            ecranAccueil2.classList.add('dontshow');
            ecranJouer.classList.remove('dontshow');
        }

        function jouerToTheme(){
            ecranJouer.classList.add('dontshow');
            ecranTheme.classList.remove('dontshow');
        }

        function jouerToNiveau(){
            ecranJouer.classList.add('dontshow');
            ecranNiveau.classList.remove('dontshow');
        }


    </script>
    <script
 			  src="https://code.jquery.com/jquery-3.1.1.min.js"
 			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
 			  crossorigin="anonymous"></script>
    <script type="text/javascript">
      function movepicture($img) {
        var picture = $(img)
      }
    </script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
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
        $($(btn).data("menu")).show();
        showbuttons($(btn).data("menu"));


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
function showbuttons(param) {
  var Btns = $(param).find('.btn');
  Btns.each(function(ind, el) {
    // $(el).css({
    //   'top': el.offsetTop,
    //   'left': el.offsetLeft
    // });
    $(el).data('top', el.offsetTop);
    $(el).data('left', el.offsetLeft);
    $(el).css({
      'top': -100,
      'left': el.offsetLeft,
    });


  });
Btns.css('position', 'absolute');
Btns.each(function(ind, el) {
  var tween = TweenMax.to(el, 0.5, {
    top: $(el).data('top'),
    ease: Power2.easeOut
  })
});
}


   </script> -->

   <!--<div id="param" class="push" style="display:none">
     <a class="btn icon-btn btn-primary"  href="#" onclick="clickButton(this); return false;" data-menu="#themes">
     <span class="glyphicon btn-glyphicon glyphicon-list-alt img-circle text-primary"></span>
     Jouer par thèmes
     </a>
     <a class="btn icon-btn btn-warning" href="#" onclick="clickButton(this); return false;">
     <span class="glyphicon btn-glyphicon glyphicon-star img-circle text-warning"></span>
     Jouer par difficulté
     </a>
   </div>

   <div id="themes" class="push" style="display:none">
     <a class="btn icon-btn btn-primary"  href="question.php?id_theme=1" onclick="clickButton(this); return true;">
     <span class="glyphicon btn-glyphicon glyphicon-list-alt img-circle text-primary"></span>
     Culture Générale
     </a>
     <a class="btn icon-btn btn-warning" href="question.php?id_theme=2" onclick="clickButton(this); return true;">
     <span class="glyphicon btn-glyphicon glyphicon-star img-circle text-warning"></span>
     Le Monde du Numérique
     </a>
     <a class="btn icon-btn btn-warning" href="question.php?id_theme=3" onclick="clickButton(this); return true;">
     <span class="glyphicon btn-glyphicon glyphicon-star img-circle text-warning"></span>
     Les Technologies du Web
     </a>
   </div>-->
      </div>
  </body>
</html>
