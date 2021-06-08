
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      //echo("<pre>"); print_r($results);echo("</pre>");
    ?> 
   
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='<?php echo($target);?>'>        
        <label for="vin">Sélectionnez un vin : </label> 
        <select class="form-control" id='vin' name='vin' style="width: 400px">
            <?php
             foreach($results[0] as $element){
                echo("<option>");
                    printf("%d : %s : %d", $element->getId(), 
             $element->getCru(), $element->getAnnee());
                    //echo implode(';', $tuple);
                
                echo("</option>\n"); 
             }
             ?>
        </select>
         <label for="producteur_id">Sélectionnez un producteur : </label> 
         <select class="form-control" id='producteur_id' name='producteur' style="width: 400px">
            <?php
            
             foreach($results[1] as $element)
            {
               echo("<option>");
               printf("%d : %s : %s : %s", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getRegion());
                echo("</option>\n"); 
             }
            ?>
        </select>
         <label for="quantite">quantite : </label> <br>
        <input type="number" step='any' name='quantite' value='10'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



