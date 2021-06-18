
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
      
      <h2><b>Vue app/view/rendezvous/viewChooseCentre</b></h2>
      
      <?php if($results[2]==0) {
           echo('<h2><b>Vue Centre ChooseCentre</b></h2> ');
          echo(" <p>Ce patient n'a rien reçu aucune injection.</p>");
           echo(" <p>Veuillez choisir un centre pour votre première dose.</p>");
           
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
                   
                echo("</option>\n"); 
             }
       
       echo(' </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
      </form> ');}
      
      
      elseif($results[2]==1){
           echo('<h2><b>Vue Centre ChooseCentre</b></h2> ');
          
          echo("Le patient".$results[1]." a reçu ".$results[4]." injection du vaccin ".$results[3]." ");
          echo(' <table class = "table table-striped table-bordered">
        <thead>
          <tr>');
             foreach ($tab[0] as $element){
             echo('<th scope = "col">'.$element.'</th>');
             }     
         echo(' </tr>
        </thead><tbody>');
            foreach($tab[1] as $tuple)
              {
                  echo("<tr>\n"); 
                 foreach ($tuple as $keys=>$val){
                      printf("<td>%s</td>\n",$val);
                  }
                  echo("</tr>\n"); 
               }
        echo('</tbody></table>');
            echo(" <p>Veuillez choisir un centre pour votre prochaine dose.</p>");
           echo('<form role="form" method="get" action="router2.php">
      <div class="form-group">
        <input type="hidden" name="action" value="rendezvousInsert">
         <input type="hidden" name="patient_id" value='.$results[1].'>
         <input type="hidden" name="vaccin_id" value='.$results[3].'>
         <input type="hidden" name="injection" value='.$results[4].'>
        <label for="id">Veuillez choisir un centre: </label> 
        <select class="form-control" id="centre" name="centre" style="width: 400px">');
         foreach($results[0] as $element){
                echo("<option>");
                    printf("%d : %s", $element["centre_id"], 
             $element["label"]);
                    
                
                echo("</option>\n"); 
             }
        echo("<p>Si la drop liste est vide , cela signifie qu'aucun centre ne dispose du vaccin reçu précédemment. "
                . "Il faudra attendre qu'il soit ravitaillé.</p>");
       
       echo(' </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
      </form> ');
      }
      elseif($results[2]==-1){
           echo('<h2><b>Dossier Vaccinal</b></h2><br> ');
           echo("<p>Toutes les doses ont été reçues</p>");
          echo(' <table class = "table table-striped table-bordered">
        <thead>
          <tr>');
             foreach ($tab[0] as $element){
             echo('<th scope = "col">'.$element.'</th>');
             }     
         echo(' </tr>
        </thead><tbody>');
            foreach($tab[1] as $tuple)
              {
                  echo("<tr>\n"); 
                 foreach ($tuple as $keys=>$val){
                      printf("<td>%s</td>\n",$val);
                  }
                  echo("</tr>\n"); 
               }
        echo('</tbody></table>');
      }
      ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewChooseCentre -->
  
  
  