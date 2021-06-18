
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
      
      <h2><b>Vue app/view/innovation/viewCentreId</b></h2> 

   <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='ReadOneCentre'>
        <label for="id">Choisisez votre centre :  </label> 
        <select class="form-control" id='patient' name='centre' style="width: 400px">
            <?php
             foreach($results as $element){
                echo("<option>");
                    printf("%d : %s : %s", $element->getId(), 
             $element->getLabel(),$element->getAdresse());
                    //echo implode(';', $tuple);
                
                echo("</option>\n"); 
             }
             ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  