
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
      <h3><b>Centre</b> : <?php echo $label ;?></h3>
      <?php echo("<h4><b>Adresse</b> :<a href='http://maps.google.com/maps?f=d&daddr=".$adresse."'>".$adresse."</a></h4>")?>
      <h4><b>Nombre total de doses</b> : <?php echo $total['total']?></h4>
      <h4><b>Liste des vaccins</b></h4>
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
    
    <h4><b>Liste des patients</b></h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
           <?php
           foreach ($results2[0] as $element){
           echo('<th scope = "col">'.$element.'</th>');
           }
           ?>        
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des stocks est dans une variable $results[1]             
       
          foreach($results2[1] as $tuple)
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
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  