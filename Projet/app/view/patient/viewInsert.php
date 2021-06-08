
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 
      <h2><b>Vue app/view/centre/viewInsert</b></h2> 
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='centreCreated'>        
        <label for="id">Label   : </label><input type="text" name='label' size='30' value='Super Centre'> &ensp;                      
        <label for="id">Adresse : </label><input type="text" name='adresse' size='30' value='13 Rue de La Lune,34892 Ciel'>               
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->



