<?php
    session_start();
    $titre = "Welcome";
    include 'header.inc.php';
    include 'menu.inc.php';


?>
<style>
      body {
        background-color: midnightblue ;
      }
      h1 {
	color: white;
         }
</style>


<div class="container">


<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
?>
        <h1>ESIG'GAMES</h1>
        <p>
            <a href="cartes.php"> <img class="left" 
             src="photos\cartes.PNG" width="250" height="150" 
             alt="cartes" title="" style="float:left;margin:10px 100px 50px 20px;" />
            </a>

            <a href="marelle.php"><img class="left" 
             src="photos\marelle.PNG" width="250" height="150" 
             alt="marelle" title="" style="float:left;margin:10px 100px 50px 20px;" />
            </a>

             <a href="mancala.php"><img class="left" 
             src="photos\mancala.PNG" width="250" height="150" 
             alt="mancala" title="" style="float:left;margin:10px 100px 50px 20px;" />
             </a>

             <a href="echecs.php"><img class="center" 
             src="photos\echecs.PNG" width="250" height="150" 
             alt="echecs" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="ludo.php"><img class="center" 
             src="photos\ludo.PNG" width="250" height="150" 
             alt="ludo" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>
             
             <a href="uno.php"><img class="center" 
             src="photos\uno.PNG" width="250" height="150" 
             alt="uno" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="dames.php"><img class="right" 
             src="photos\dame.PNG" width="250" height="150" 
             alt="dames" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="monopoly.php"><img class="right" 
             src="photos\monopoly.PNG" width="250" height="150" 
             alt="monopoly" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="loup garou.php"><img class="right" 
             src="photos\loup garou.PNG" width="250" height="150" 
             alt="loup garou" title="" style="float:center;margin:10px 100px 50px 20px;" />
            </a>
            </p>
        

</div>
<?php
    include 'footer.inc.php';
?>