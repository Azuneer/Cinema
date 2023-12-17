 <?php
	ini_set('display_errors',1);
	include 'header.php';
	$pdo = new PDO('mysql:dbname=nsi;host=sd15984-001.privatesql:35436;
	charset=UTF8','nsi-terminale','Terminale79500');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	?>

<style>
	.bgimg {

 		background-position: center;
 		background-size: cover;
  		background-image: url("images/resultats_background.jpg");
  		min-height: 75%;
}
</style>

<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small animation_label">
    <span class="w3-tag">toutsurlecinema.<a href="credits_secrets.php" class="no-underline rainbow-hover">™</a></span>
  </div>
  <div class="w3-display-middle w3-center font-Cantique-titre">
    <span>Résultats</span>
  </div>
</header>

<?php
if (isset($_POST['submit'])) {
  $choix = $_POST['choix'];
  $recherche = $_POST['recherche'];
  if ($choix === "realisateur") {
    $req = $pdo->prepare("SELECT p.title, g1.genre AS genre1, g2.genre AS genre2, g3.genre AS genre3, py.pays, l.langue, p.year, p.director
                            FROM (
                                SELECT title, genre1, genre2, genre3, country, language, year, director
                                FROM CINE_principale1
                                WHERE director LIKE ?
                                UNION ALL
                                SELECT title, genre1, genre2, genre3, country, language, year, director
                                FROM CINE_principale2
                                WHERE director LIKE ?
                                UNION ALL
                                SELECT title, genre1, genre2, genre3, country, language, year, director
                                FROM CINE_principale3
                                WHERE director LIKE ?
                            ) AS p
                            LEFT JOIN CINE_genres AS g1 ON p.genre1 = g1.id_genre
                            LEFT JOIN CINE_genres AS g2 ON p.genre2 = g2.id_genre
                            LEFT JOIN CINE_genres AS g3 ON p.genre3 = g3.id_genre
                            LEFT JOIN CINE_pays AS py ON p.country = py.id_pays
                            LEFT JOIN CINE_langues AS l ON p.language = l.id_langue");
    $req->execute(["%".$recherche."%", "%".$recherche."%", "%".$recherche."%"]);

    echo "Recherche : " . $recherche;
    echo "Choix : " . $choix;

    if ($req->rowCount() > 0) {
        // Affiche les résultats de la recherche
        echo '<div class="w3-container" id="apropos">
                <div class="w3-content" style="max-width:700px">
                    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Films du réalisateur : '.$recherche.'</span></h5>
                </div>
            </div>';

        // Début du conteneur flexbox
        echo '<div class="film-container">';

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $title = $row['title'];
            $year = $row['year'];
            $genres = array($row['genre1'], $row['genre2'], $row['genre3']);
            $genres = array_filter($genres); // Supprime les genres vides
            $director = $row['director'];
            $pays = $row['pays'];
            $langue = $row['langue'];

            // Affichage d'un film dans une cellule flexbox
            echo '<div class="film">';
            echo "<p><strong>Titre : ".$title."</strong></p>";
            echo "<p>Année : ".$year."</p>";

            // Vérifier s'il y a des genres à afficher
            if (!empty($genres)) {
                echo "<p>Genres : ".implode(", ", $genres)."</p>";
            }

            echo "<p>Pays : ".$pays."</p>";
            echo "<p>Langue : ".$langue."</p>";
            echo "<p>Réalisateur : ".$director."</p>";

            echo '</div>';
        }

        // Fin du conteneur flexbox
        echo '</div>';
    } else {
        // Affiche un message d'erreur
        echo '<div class="w3-container" id="apropos">
                <div class="w3-content" style="max-width:700px">
                    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Aucun film trouvé</span></h5>
                </div>
            </div>';
        echo '<p>⚠️Aucun film trouvé pour le réalisateur suivant : '.$recherche.'. Faites attention au format (Prénom + *espace* + Nom)⚠️</p>';
    }
}
  } elseif ($choix === "film") {
    echo "Recherche : " . $recherche;
    echo "Choix : " . $choix;
    // Recherche par titre de film
    $req = $pdo->prepare("SELECT p.title, p.year, g1.genre AS genre1, g2.genre AS genre2, g3.genre AS genre3, py.pays, l.langue, p.director
                            FROM (
                                SELECT title, year, genre1, genre2, genre3, country, language, director
                                FROM CINE_principale1
                                WHERE title LIKE ?
                                UNION ALL
                                SELECT title, year, genre1, genre2, genre3, country, language, director
                                FROM CINE_principale2
                                WHERE title LIKE ?
                                UNION ALL
                                SELECT title, year, genre1, genre2, genre3, country, language, director
                                FROM CINE_principale3
                                WHERE title LIKE ?
                            ) AS p
                            LEFT JOIN CINE_genres AS g1 ON p.genre1 = g1.id_genre
                            LEFT JOIN CINE_genres AS g2 ON p.genre2 = g2.id_genre
                            LEFT JOIN CINE_genres AS g3 ON p.genre3 = g3.id_genre
                            LEFT JOIN CINE_pays AS py ON p.country = py.id_pays
                            LEFT JOIN CINE_langues AS l ON p.language = l.id_langue");
    $req->execute(["%".$recherche."%", "%".$recherche."%", "%".$recherche."%"]);

    echo "Recherche : " . $recherche;
    echo "Choix : " . $choix;

    if ($req->rowCount() > 0) {
        // Affiche les résultats de la recherche
        echo '<div class="w3-container" id="apropos">
                <div class="w3-content" style="max-width:700px">
                    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Film(s) correspondant(s) à : '.$recherche.'</span></h5>
                </div>
            </div>';

        // Début du conteneur flexbox
        echo '<div class="film-container">';

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $title = $row['title'];
            $year = $row['year'];
            $genres = array($row['genre1'], $row['genre2'], $row['genre3']);
            $genres = array_filter($genres); // Supprime les genres vides
            $pays = $row['pays'];
            $langue = $row['langue'];
            $director = $row['director'];

            // Affichage d'un film dans une cellule flexbox
            echo '<div class="film">';
            echo "<p><strong>Titre : ".$title."</strong></p>";
            echo "<p>Année : ".$year."</p>";

            // Vérifier s'il y a des genres à afficher
            if (!empty($genres)) {
                echo "<p>Genres : ".implode(", ", $genres)."</p>";
            }

            echo "<p>Pays : ".$pays."</p>";
            echo "<p>Langue : ".$langue."</p>";
            echo "<p>Réalisateur : ".$director."</p>";

            echo '</div>';
        }

        // Fin du conteneur flexbox
        echo '</div>';
    } else {
        // Aucun film trouvé
        echo '<div class="w3-container" id="apropos">
                <div class="w3-content" style="max-width:700px">
                    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Aucun film trouvé pour : '.$recherche.'</span></h5>
                </div>
            </div>';
    }
}
?>

<?php include 'footer.php';?>
