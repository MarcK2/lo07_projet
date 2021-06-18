
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>
      <h3><b>Documentation Innovation 2 : </b></h3>
      <div class="panel panel-primary" id="2">
        <div class="panel-heading">Affichage quantite total d'un vaccin disponible en France</div>
        <div class="panel-body ">       
        <p> Pour cette innovation , nous nous sommes interressés aux données liées aux vaccins afin de les rendre plus facilement lisibles.
        A aucun moment dans le site on peut voir combien de dose en tout a un vaccin.
        C'est une information qui peut être utile à l'utilisateur pour ensuite "recommander" des doses de vaccin à repartir
        entre les centres (Attribution de vaccin pour un centre), ça permet de se rendre compte facilement qu'il y a 
        un vaccin en manque de dose dans sans doute tous les centres. On peut se donner une limite, par exemple on doit avoir
        au minimum 10 doses de chaques vaccin,
        et si ce n'est pas le cas on fait une "commande" du nombre de dose manquante et on les attribut aux centres qui sont 
        en manque de ce vaccin (on pourras verifier
        grace à la gestion des stocks). L'information pourrait être obtenue avec "liste des centres avec le nombre de doses de 
        chaques vaccin", mais il faudrait compter à la main pour le vaccin qu'on cherche, le nombre de dose dans chaque centre ce qui peut être long.
        
        <p/>
        <p> Il suffit donc de choisir le vaccin et ça nous affiche le nom du vaccin choisi et quantite total de ce vaccin disponible.<p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  