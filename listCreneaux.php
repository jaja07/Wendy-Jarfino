<?php
// Connexion à la base de données  
require_once('roleMembre.php');
include 'header.inc.php';
include 'menuMembre.inc.php';
$titre = "Liste créneaux";
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
    <h1>Listes des créneaux disponibles</h1>

    
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">ID Creneau</th>
                <th scope="col">Date</th>
                <th scope="col">Jeu</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>

            <?php
               // Récupérer les créneaux de jeux depuis la table "jeux"
                $query = "SELECT creneau.idCreneau, creneau.date, jeux.nom FROM creneau INNER JOIN jeux ON creneau.idJeux=jeux.idJeux ";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    $i=0;
                    while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idCreneau'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['nom'] . '</td>';
                    echo '<td><a href="tt_creneauMembre.php?idCreneau=' . $row['idCreneau'] . '">Inscription</a></td>';
                    echo '</td>';
                    echo '</tr>';
                    }
                }
                // Fermer la connexion
                    $mysqli->close();
            ?>
        </tbody>
    </table>




</div>