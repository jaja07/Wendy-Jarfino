<?php
    require_once('roleAdmin.php');
    $titre = "Ajouter des jeux";
    include 'header.inc.php';
    include 'menuAdmin.inc.php';
    
?>
<div class="container">
<h1>Ajouter un Jeu</h1>
<form method="POST" action="tt_addGame.php" enctype="multipart/form-data">
    <div class="container">
        <!-- Nom du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Donnez un nom au jeu..." required>
            </div>
        </div>
        
        <!-- Description du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea> 
            </div>
        </div>
        
        <!-- Catégorie du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="categorie" class="form-label">Catégorie :</label>
                <input type="text" class="form-control" id="categorie" name="categorie" required>
            </div>
        </div>
        <!-- Regle du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="regle" class="form-label">Règle :</label>
                <input type="file" id="regle" name="regle" class="form-control" required>
            </div>
        </div>

        <!-- Image du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="image" class="form-label">Image :</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
        </div>

         <div class="row my-3">
            <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" name="submit" type="submit">Valider</button></div>   
        </div>


    </div>
</form>
</div>
<?php
    include 'footer.inc.php';
?>