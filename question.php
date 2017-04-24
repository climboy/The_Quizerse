<?php
// Connexion
try {
	$port = '';
	if($_SERVER["HTTP_HOST"] == 'localhost:8081') {
		$port = ':3307';
	}
	$bdd = new PDO('mysql:host=localhost'.$port.';dbname=quizerse;charset=utf8', 'root', '');
} catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

// Si un thème est défini, on applique le filtre
$id_theme = (isset($_GET["id_theme"]) && is_numeric($_GET["id_theme"]) ? $_GET["id_theme"] : null);

// On prend les questions du thème (pour le moment les QCU)
$query = $bdd->query("
	SELECT *
	FROM question
	WHERE typologie = 'qcu'
	".(!empty($id_theme) ? " AND id_theme = $id_theme " : "")."
	ORDER BY id");
$questionsBase = $query->fetchAll(PDO::FETCH_ASSOC);

$questions = array();

foreach($questionsBase as $question) {
	// Obtention des réponses à la question
	$query = $bdd->prepare("SELECT * FROM reponse WHERE id_question = :id_question ORDER BY id");
	$query->bindValue("id_question", $question["id"]);
	$query->execute();
	$reponses = $query->fetchAll(PDO::FETCH_ASSOC);

	// Si on n'a pas de feedback, on en met par défaut
	if(empty($question["feedback_juste"])) {
		$question["feedback_juste"] = "Bravo, bien répondu !";
	}
	if(empty($question["feedback_faux"])) {
		$question["feedback_faux"] = "Perdu, c'est faux !";
	}

	$question["reponses"] = $reponses;
	$questions[] = $question;
}

?>
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
  </head>
  <body>
  <script type="text/javascript">
  	var Quizerse = {
  		questions: <?php echo json_encode($questions); ?>,
      erreur:3,
  		init: function() {
  			// Génère la première question
  			Quizerse.Question.generer(0, true);
  		},

  		Question: {
  			actuelle: 0,
  			instance: null,

  			// Création des éléments
  			generer: function(nb, affiche) {
	  			if(nb === null) {
	  				nb = Quizerse.Question.actuelle;
	  			}

	  			if(Quizerse.Question.instance !== null) {
	  				// Retire la question actuelle s'il y en a une
	  				var container = $('.container');
	  				Quizerse.Question.supprimer(true);
	  				return;
	  			}

	  			Quizerse.Question.actuelle = nb;

	  			var question = Quizerse.questions[nb];
	  			if(question) {
	  				Quizerse.Question.instance = question;
	  				var cnt = $('<div/>', {
	  					class: "container"
	  				});
	  				var titre = $('<p/>', {
	  					"text": question.enonce
	  				}).appendTo(cnt);

	  				$.each(question.reponses, function(ind, el) {
	  					var btn = $('<button/>', {
	  						"text": el.enonce,
	  						"class": "btn icon-btn btn-warning",
	  						"data-j": el.juste
	  					}).appendTo(cnt);
	  				});

	  				cnt.find('.btn').on('click', Quizerse.reponse);

		  			cnt.appendTo(document.body);

		  			if(affiche) {
		  				Quizerse.Question.afficher();
		  			}
	  			}
	  		},

	  		afficher: function() {
	  			// fonction permettant de zoomer le contenaire //
				TweenMax.set('.container', {
					visibility: "visible",
					scale: 0,
					transformOrigin:"50% 50%"
				});
				// scale de 1 sur l'élément //
				TweenMax.to('.container', 0.7, {scale:1});
	  		},

	  		supprimer: function(genereSuivante) {
	  			TweenMax.to('.container', 0.7, {
					scale:0,
					onComplete: function() {
						$('.container').remove();
						Quizerse.Question.instance = null;
						if(genereSuivante) {
							Quizerse.Question.generer(null, true);
						}
					}
				});
	  		}
  		},

  		// Lors du clic sur une réponse
  		reponse: function() {
			// Pour le bouton cliqué, on vérifie si la réponse est juste, on applique la couleur et affiche le feedback correspondant
			$('.container').css('transition', 'all .2s');
			var msg = "";

			if($(this).data('j') == '1') {
				// Réponse juste
				$('.container').css('background-color', "#5cb85c");
				$('.container p').css('color', "#fff");
				msg = Quizerse.Question.instance.feedback_juste;
			} else {
				// Réponse fausse
				$('.container').css('background-color', "#d9534f");
				$('.container p').css('color', "#fff");
				msg = Quizerse.Question.instance.feedback_faux;
				Quizerse.erreurs++;
			}

			// Alerte après 220ms pour avoir le temps d'afficher le changement de couleur du container
			setTimeout(function() {
				alert(msg);
				Quizerse.suite();
			}, 220);
  		},

  		// Question suivante
  		suite: function() {
				if (Quizerse.questions[Quizerse.Question.actuelle+1]) {
					Quizerse.Question.generer(Quizerse.Question.actuelle++);
				}
				else {
					alert('Fin du jeu');
					location.href = 'index.php';
				}
  		}
  	};

  	Quizerse.init();
  </script>
  </body>
</html>
