<?php
session_start();

$email =  htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 // Vérification du mot de passe entré par l'utilisateur
 if ($stmt = $mysqli->prepare("SELECT user(nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)")) {
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
            if (password_verify( $password,$row["password"])) {
              // Redirection vers la page admin.php ou autres en fonction du role (tuteur,admin,etc...)

              $_SESSION[ 'message' ] = "Authentification réussi pour un role inconnu.";
              if($row["role"]==1)
              {
                $_SESSION['message'] = "Authentification réussi pour un admin";
              }
              if($row["role"]==2)
              {
                $_SESSION['message'] = "Authentification réussie pour un tuteur";
              }
              if($row["role"]== 3)
              {
                $_SESSION['message'] = "Authentification ";
              }
    
    
    
    
    }

    }


    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";

    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer";
    }
  }
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">
<h1>Connexion</h1>
    <p>À faire...</p>

</div>
<?php
    include 'footer.inc.php';
?>