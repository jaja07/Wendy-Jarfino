<?php
    session_start();
    $titre = "Uno";
    include 'header.inc.php';
    include 'menu.inc.php';

?>

<h1>ESIG'GAMES</h1>
        <p>
            <img class="left" 
             src="photos\uno.PNG" width="500" height="300" 
             alt="uno" title="" style="float:left;margin:70px 10px 50px 20px;" />
            
        </p>

        <div >
        <p  style="float:left;margin:50px 10px 50px 20px;">
        <strong>Nom: </strong>Uno<br/>
        <strong>Description: </strong><br/>
        Pour gagner une manche de Uno, il faut être le premier joueur à se défausser de la dernière carte de sa main. 
        <br/> La manche s'arrête alors (après les pioches de cartes éventuelles), et l'on compte les points. 
        <br/> Le jeu continue, manche par manche, jusqu'à ce qu'un joueur atteigne 500 points.
       <br/><br/> Pour comptabiliser les points, il existe alors deux "écoles" :
       <br/> Certains comptabilisent les points des perdants, et 0 point pour le vainqueur de la manche. 
       <br/> ~~Le vainqueur de la partie est le joueur qui a le moins de points lorsque l'un des joueurs atteint 500 points ;
       <br/> D'autres comptabilisent les points au gagnant de la manche, qui engrange les points de tous ses adversaires vaincus.
       <br/> ~~Là, le vainqueur de la partie est celui qui atteint le premier les fameux 500 points.
       <br/> ~~C'est la version qui est employée par le jeu vidéo officiel.
       <br/> Certains joueurs comptent plutôt le nombre de manches gagnées que le score en points. 
       
       <br/><br/><strong>Règles détaillées: </strong> <a href="règles\La_règle_du_Uno.pdf" target="_blank">Télécharger le PDF</a>
            
        </p>