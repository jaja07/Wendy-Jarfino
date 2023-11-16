<?php
session_start();
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">
<h1>Connexion</h1>
    <p>À faire...</p>
    <p class="p1"> ESIG'GAMES</p>
    <form method="post" action="tt_connexion.php">
        <div class="container">
            <!-- Email -->
            <div class="mb-3 mt-3 col-md-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <!-- Mot de passe -->
            <div class="mb-3 col-md-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Montrer le mot de passe
                </label>
            </div>
            <button class="btn btn-outline-primary" name="submit" type="submit">Se connecter</button>
            
        </div>

    </form>
</div>
<?php
    include 'footer.inc.php';
?>