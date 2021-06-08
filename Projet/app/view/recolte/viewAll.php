
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
      <a href=#tab2><h3>Aller au second tableau</h3></a>  <br> <br><!-- comment -->
      
      
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
          // La liste des recoltes est dans une variable $results[1]             
       
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
    <h3 id="tab2">Tableau 2</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
           <?php
           foreach ($results[2] as $element){
           echo('<th scope = "col">'.$element.'</th>');
           }
           ?>        
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des recoltes est dans une variable $results[1]             
       
          foreach($results[3] as $tuple)
            {
                echo("<tr>\n"); 
               foreach ($tuple as $keys=>$val){
                    printf("<td>%s</td>\n",$val);
                }
                echo("</tr>\n"); 
             }
          ?>
      </tbody>
    </table>

  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  