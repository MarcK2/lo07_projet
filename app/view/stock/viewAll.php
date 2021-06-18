
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
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
           <?php
           foreach ($results[0] as $element){
           echo('<th scope = "col">'.$element.'</th>');
           }
           ?>        
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des stocks est dans une variable $results[1]             
       
          foreach($results[1] as $tuple)
            {
                echo("<tr>\n"); 
               foreach ($tuple as $keys=>$val){
                    printf("<td>%s</td>\n",$val);
                }
                echo("</tr>\n"); 
             }
          ?>
      </tbody>
    </table> <br><!-- comment -->
   
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  