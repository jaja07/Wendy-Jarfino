<?php
// Connexion à la base de données 
require_once('roleMembre.php');
include 'header.inc.php';
include 'menuMembre.inc.php';
  
  
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }

// Récupérer les créneaux de jeux depuis la table "jeux"
$query = "SELECT creneau.idCreneau, creneau.date, jeux.nom FROM creneau INNER JOIN jeux ON creneau.idJeux=jeux.idJeux ";
$result = $mysqli->query($query);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Créer le formulaire avec la liste déroulante
    echo '<form action="process_inscription.php" method="post">';
    echo '<label for="creneau">Choisissez un créneau :</label>';
    echo '<select name="creneau" id="creneau">';
    
    // Afficher chaque créneau comme une option dans la liste déroulante
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['jeux.nom'] . '">' . $row['date'] . '</option>';
    }

    echo '</select>';
    echo '<input type="submit" value="S\'inscrire">';
    echo '</form>';
} else {
    echo "Aucun créneau de jeu disponible.";
}

// Fermer la connexion
$mysqli->close();
?>