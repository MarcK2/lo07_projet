
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
        <div class="panel-heading">Suppression d'un rendez-vous : </div>
        <div class="panel-body ">       
        <p> Pour cette innovation , nous nous sommes interressés aux données liées aux vaccins afin de les rendre plus facilement lisibles.
        
        
        <p/>
        <p> Il suffit donc de choisir le patient et ça nous affiche le nom du vaccin choisi et quantite total de ce vaccin disponible.<p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  