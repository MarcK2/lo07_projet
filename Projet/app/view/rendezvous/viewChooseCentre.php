
<!-- ----- début viewChooseCentre -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>
      
      <h2><b>Vue Centre ChooseCentre</b></h2> 
     
      <?php if($results[2]==0) {
          echo(" <p>Ce patient n'a rien reçu aucune injection.</p>");
           
   echo('<form role="form" method="get" action="router2.php">
      <div class="form-group">
        <input type="hidden" name="action" value="rendezvousFirstInsert">
         <input type="hidden" name="patient_id" value='.$results[1].'>
        <label for="id">Veuillez choisir un centre: </label> 
        <select class="form-control" id="centre" name="centre" style="width: 400px">');
         foreach($results[0] as $element){
                echo("<option>");
                    printf("%d : %s", $element["centre_id"], 
             $element["label"]);
                    //echo implode(";", $tuple);
                
                echo("</option>\n"); 
             }
       
       echo(' </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
      </form> ');}
      elseif($results[2]==1){
          
      }
      ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewChooseCentre -->
  
  
  