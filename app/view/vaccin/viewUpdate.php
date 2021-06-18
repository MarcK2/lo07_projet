
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
require_once '../model/ModelVaccin.php';
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 
      <h2><b>Vue app/view/vaccin/viewUpdate</b></h2> 
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinUpdated'>        
        <label for="vaccin">Sélectionnez le vaccin à modifier : </label> 
        <select class="form-control" id='vaccin' name='vaccin' style="width: 300px">
            <?php
             foreach($results as $element){
               echo("<option>");
                    printf("%d : %s : %d", $element->getId(), 
             $element->getLabel(), $element->getDoses());
             }
             ?>
        </select>
        <label for="doses">Saisissez la dose : </label> <br>
        <input type="number" step='any' name='doses' value='10'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->



