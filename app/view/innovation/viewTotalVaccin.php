
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
    echo("<div>");
     echo ("<h3>Voici la quantite total de dose pour ce vaccin disponible en France :</h3></br>");
     echo ("<h4>Vaccin =>  " . $vaccin_id[1] . "</h4>");
     echo ("<h4>Quantite totale  =>  "   .$resultat. "</h4>");
    echo("</div>");
    echo("</div>");
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    