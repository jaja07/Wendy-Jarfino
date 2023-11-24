<?php

require_once('roleAdmin.php');
// Valider et nettoyer l'ID
$id = isset($_GET['idCreneau']) ? intval($_GET['idCreneau']) : 0;

var_dump($id);
include("connpdo.php");


// Suppression du jeu de la base de données
$q_delete = $pdo->prepare("DELETE FROM creneau WHERE idCreneau=?");
$q_delete->bindParam(1, $id, PDO::PARAM_INT);
$q_delete->execute();
$q_delete->closeCursor();



header("location:creneauAdmin.php");
?>

