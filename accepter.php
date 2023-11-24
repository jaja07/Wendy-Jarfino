<?php
require_once("roleAdmin.php");
 
$id = $_GET['id'];
  
// Connexion :
include("connpdo.php");
    $stmt1=$pdo->prepare("UPDATE inscription SET statut=? WHERE id=?");
    $statut = 'Accepté(e)';
    $stmt1->bindParam(1, $statut, PDO::PARAM_INT);
    $stmt1->bindParam(1, $id, PDO::PARAM_INT);
    $stmt1->execute();
    $stmt1->closeCursor();
// Redirection vers la page des listes de membres
header("location:listMembres.php");
?>


