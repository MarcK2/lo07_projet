
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
        <div class="panel-heading">Affichage de la quantite total de vaccin et de chaque vaccin pour un centre avec son adresse map et la liste des patients vaccinés dans ce centre : </div>
        <div class="panel-body ">       
        <p> Pour cette innovation , nous avons cherché à exploiter toutes les données liées aux centres et à les rendre facilement lisibles.
        Le lien cliquable est particulierement interressant pour voir rapidement où se situe le centre de vaccination. De même, le nombre de patients
        vacciné dans ce centre peut être une information très pertinente pour savoir si le centre est très frequenté par exemple, il faudrai alors prevoir de donner plus de dose de vaccin dans
        ce centre (Attribution de vaccin pour un centre). La liste des vaccins avec les doses disponibles et le nombre d'injections nécessaires est une association des informations que l'on peut trouver
        dans l'onglet vaccin et dans l'onglet stock, mais c'est plus rapide à lire car c'est un tableau pour le centre choisi au lieu toutes les informations mélangées. 
        Le nombre de dose total est plus une information recapitulative car elle peut être trouvé sur la page "Stock/Nombre Globale de doses des centres", 
        mais le but de cette page c'est de regrouper differentes informations qui sont rapidement lisible, comprehensible et recapitulatives.
        <p/>
        <p> On choisi donc un centre et on obtient comme informations : le nom du centre, l'adresse du centre (elle est cliquable et ouvre la page google maps correspondante à l'adresse),
            le nombre de doses totale (tout vaccin confondu) present dans le centre, la liste des vaccins avec les doses disponibles et le nombre d'injections nécessaires et
             la liste des patients vaccinés dans ce centre suivant le vaccin et la dose reçue.
        <p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  