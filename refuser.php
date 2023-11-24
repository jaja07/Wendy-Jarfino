<?php
require_once("roleAdmin.php");
 
$id = $_GET['id'];
  
// Connexion :
include("connpdo.php");
    $stmt1=$pdo->prepare("UPDATE inscription SET statut=? WHERE id=?");
    $statut = 'Refusé(e)';
    $stmt1->bindParam(1, $statut, PDO::PARAM_INT);
    $stmt1->bindParam(1, $id, PDO::PARAM_INT);
    $stmt1->execute();
    $stmt1->closeCursor();

    // Suppression du jeu de la base de données
    $q_delete = $pdo->prepare("DELETE FROM inscription WHERE id=?");
    $q_delete->bindParam(1, $id, PDO::PARAM_INT);
    $q_delete->execute();
    $q_delete->closeCursor();
 
// Redirection vers la page des listes de membres
header("location:listMembres.php");
?>


