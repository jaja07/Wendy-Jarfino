<?php
include 'param.inc.php';
// Initialisation de la connexion
$connexion = new mysqli($host, $login, $passwd, $dbname);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    // Récupération des emails et des mots de passe depuis la base de données
    $result_email = $connexion->query("SELECT email FROM user");
    $result_pswd = $connexion->query("SELECT password FROM user");

    foreach ($result_email as $value_email){
        if($_POST['email'] == $value_email){
            $test_email = 1;
        }else{
            $test_email = 0;
        }
    }

    foreach ($result_pswd as $value_pswd){
        if($_POST['pswd'] == $value_pswd){
            $test_pswd = 1;
        }else{
            $test_pswd = 0;
        }
    }

    if($test_email==1 && $test_pswd==1){
        header('Location: index.php');
        exit();
    }
    
}
// Fermeture de la connexion à la base de données
$connexion->close();
?>