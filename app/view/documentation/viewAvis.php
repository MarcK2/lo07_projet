
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
      <h3><b>Avis general : </b></h3>
      <div class="panel panel-primary" id="2">
        <div class="panel-heading">Le projet :</div>
        <div class="panel-body ">       
        <p> Le projet est d'actualité donc c'est plutôt interressant,
        <p/>
        </div>
    </div>
    
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  