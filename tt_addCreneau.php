<?php
require_once('roleAdmin.php');

$jeu=$_POST['sel1'];
$date = $_POST['sel2'];

//Connexion à la base de données
include("connpdo.php");
$req1="SELECT idJeux FROM jeux WHERE nom = :jeu ";
$stmt1=$pdo->prepare($req1);
$stmt1->bindParam(':jeu',$jeu);
$stmt1->execute();
if($resultat = $stmt1->fetch()){
    $idJeux = $resultat['idJeux'];

$req2="INSERT INTO creneau (date, idJeux) VALUES (:date, :idJeux)";
$stmt2=$pdo->prepare($req2);
$stmt2->bindParam(':date', $date);
$stmt2->bindParam(':idJeux', $idJeux);

if($stmt2->execute()) {
$_SESSION['message'] = "Ajout réussi.";
header("location:accueilAdmin2.php");
} else {  $_SESSION['message'] = "Problème Ajout.";

    header("location:accueilAdmin2.php");  }
} else{
    $_SESSION['message'] = "Problème d'ID.";
}

