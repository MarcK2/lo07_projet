 
<!-- ----- debut de la page mes propositions  -->
<?php include '../view/fragment/fragmentCaveHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include '../view/fragment/fragmentCaveMenu.html';
    include '../view/fragment/fragmentCaveJumbotron.html';
    ?>
      <h2>Propositions</h2>
      <ul>
          <li><b>Correction de code</b> :Dans les fragments CaveFooter et CaveJumbotron et dans le viewInsert il y a des bases "< /p >" fermantes
              sans avoir été ouvertes. Dans le viewInsert il y a des attributs inutiles car n'apportant aucune information comme des label for=id
              ou form role=form .<br></li>
          
          <li><b>Idée d'ajout</b> : On pourrait demander des autorisations ou demande de confirmation avant de pouvoir modifier la base de données (ajouter ou supprimer 
              des vins ou producteurs). Aussi On pourrait rajouter l'option supprimer un vin ou un producteur.<br></li>
      </ul>
  </div>   
  
  
  <?php
  include '../view/fragment/fragmentCaveFooter.html';
  ?>

  <!-- ----- fin de la page mes propositions -->

</body>
</html>