<?php
// Connexion à la base de données  
require_once('roleMembre.php');
include 'header.inc.php';
include 'menuMembre.inc.php';
$titre = "Mes créneaux";

  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  ?>

<div class="coontainer">

<?php
    
         if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
            }
    ?>
    <h1>MES CRENEAUX</h1>

    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Creneau</th>
                <th scope="col">Date</th>
                <th scope="col">Jeu</th>
                <th scope="col">Statut</th>
            </tr>
        </thead>
        <tbody>

            <?php
               // Récupérer les créneaux de jeux depuis la table inscription
                $query = "SELECT creneau.idCreneau, creneau.date, jeux.nom, inscription.statut, inscription.idUser FROM jeux JOIN creneau ON jeux.idJeux=creneau.idJeux JOIN inscription ON creneau.idCreneau=inscription.idCreneau ";
                $result = $mysqli->query($query);
                
                    if ($result->num_rows > 0) {
                    //if($row['idUser']=$_SESSION['PROFILE']['idUser']){
                    while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idCreneau'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['nom'] . '</td>';
                    echo '<td>' . $row['statut'] . '</td>';
                    echo '</td>';
                    echo '</tr>';
                    }
                }//}
                // Fermer la connexion
                    $mysqli->close();
            ?>
        </tbody>
    </table>




</div>