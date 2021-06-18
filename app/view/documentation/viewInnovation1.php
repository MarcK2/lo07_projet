
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
      <h3><b>Documentation Innovation 1 :</b> </h3>
      <div class="panel panel-primary" id="2">
        <div class="panel-heading">Affichage du nombre total de dose (quantite) d'un vaccin disponible en France</div>
        <div class="panel-body ">       
        <p> A aucun moment dans le site on peut voir combien de dose total a un vaccin.
        C'est une information qui peut etre utile a l'utilisateur pour ensuite "recommander" des doses de vaccin a repartir
        entre les centres (Attribution de vaccin pour un centre), ça permet de se rendre compte facilement qu'il y a 
        un vaccin en manque de dose dans sans doute tout les centres. On peut se donner une limite, par exemple on doit avoir
        au minimum 10 doses de chaques vaccin,
        et si ce n'est pas le cas on fait une "commande" du nombre de dose manquante et on les attribut aux centres qui sont 
        en manque de ce vaccin (on pourras verifier
        grace a la gestion des stocks). L'information pourrais etre obtenu avec "liste des centres avec le nombre de doses de 
        chaques vaccin", mais il faudrai compter a la main
        
        <p/>
        <p> Il suffit donc de choisir le vaccin et ca nous affiche le nom du vaccin choisi et le nombre de dose total de ce vaccin.<p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  