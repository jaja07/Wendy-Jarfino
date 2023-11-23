<?php
   require_once('roleMembre.php');
  $idCreneau = isset($_GET['idCreneau']) ? intval($_GET['idCreneau']) : 0;
  
  // Create connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }

  if ($stmt = $mysqli->prepare("INSERT INTO Inscription (idCreneau, idUser) VALUES (?, ?)")) {
      $stmt->bind_param("ii", $idCreneau, $_SESSION['PROFILE']['idUser']);

    if ($stmt->execute())
     {
        $_SESSION['message'] = "Inscription réussie";

    } else {
        $_SESSION['message'] =  "Impossible de s'inscrire";
    }
}
  $mysqli->close();
  // Redirection vers la page de connexion par exemple :
  header('Location: listCreneaux.php');


?>