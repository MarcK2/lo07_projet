
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
      <h3><b>Documentation Innovation 3 : </b></h3>
      <div class="panel panel-primary" id="2">
        <div class="panel-heading">Updating de l'adresse d'un centre : </div>
        <div class="panel-body ">       
        <p> Pour cette innovation , nous nous interressons à l'adresse d'un centre.
            Les centres vaccination covid ne sont pas fixe, ils peuvent garder le mmême nom pour plus de facilité mais changer d'adresse, 
            c'est pourquoi on a decidé de faire un changement d'adresse possible pour un centre déjà existant. C'est egalement possible
        <p/>
        <p> Il suffit donc de choisir le centre et de modifier l'adresse en dessous et ça changera l'adresse dans la base de donnée. Ensuite ça nous affiche une page récapitulative avec le nom du centre, la nouvelle adresse et la confirmation de l'updating.<p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  