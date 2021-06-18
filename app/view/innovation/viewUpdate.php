
<!-- ----- début viewUpdate -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
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
        <input type="hidden" name='action' value='centreUpdated'>        
        <label for="vaccin">Sélectionnez le centre à modifier : </label> 
        <select class="form-control" id='centre' name='centre' style="width: 300px">
            <?php
             foreach($results as $element){
               echo("<option>");
                    printf("%d : %s : %d", $element->getId(), 
             $element->getLabel(), $element->getAdresse());
             }
             ?>
        </select>
        <label for="doses">Saisissez la nouvelle adresse : </label> <br>
        <input type="text" name='adresse' value='12 Rue Marie Curie,10000,Troyes'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewUpdate -->



