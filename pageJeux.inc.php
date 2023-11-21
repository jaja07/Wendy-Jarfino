<?php
// Ouvrir le fichier en mode écriture (créez-le s'il n'existe pas)
$handle = fopen($nomFichier, "w");

// Vérifier si l'ouverture du fichier a réussi
if ($handle) {
    // Le contenu de votre page dynamique
    $contenuPage = "<?php echo 'Bonjour, ceci est ma page dynamique!'; ?>";

    // Écrire le contenu dans le fichier
    fwrite($handle, $contenuPage);

    // Fermer le fichier
    fclose($handle);

    echo "La page dynamique a été créée avec succès!";
} else {
    echo "Erreur lors de l'ouverture du fichier.";
}
?>