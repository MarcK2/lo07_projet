
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCovidMenu.html';
    include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?>
      <h2><b>Vue app/view/innovation/viewTotalVaccin</b></h2> 
    <!-- ===================================================== -->
    <?php
     echo ("<h3>Voici le nombre total de dose pour ce vaccin disponible en France :</h3>");
     echo("<ul>");
     echo ("<li>Vaccin =>  " . $vaccin_id[1] . "</li>");
     echo ("<li>Doses totales =>  " .$resultat. "</li>");
     echo("</ul>");

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    