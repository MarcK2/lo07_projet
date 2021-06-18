
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
      
      <h2><b>Vue app/view/innovation/viewRendezvousFixed</b></h2> 
     
      <?php if($results[3]==0) {
            echo('<p>Le patient'.$results[1].' aura sa première dose de  '.$results[2].''
                    . ' dans le centre '.$results[4].' </p>');
   
      }
      elseif($results[3]==1){
           echo('<p>Le patient'.$results[1].' aura  sa '.$results[5].'ème dose de  '.$results[2].''
                   . ' dans le centre '.$results[4].' </p>');
      }
      
      ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewChooseCentre -->
  
  
  