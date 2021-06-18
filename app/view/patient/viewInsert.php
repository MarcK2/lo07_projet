
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
      <h2><b>Vue app/view/patient/viewInsert</b></h2> 
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='patientCreated'>        
        <label for="id">Nom : </label><input type="text" name='nom' size='30' value='MorningStar'> &ensp;                      
        <label for="id">Prenom : </label><input type="text" name='prenom' size='30' value='Lucifer'>
        <label for="id">Adresse : </label><input type="text" name='adresse' size='30' value='Les Enfers'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->



