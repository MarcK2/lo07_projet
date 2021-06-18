
<!-- ----- début viewUpdated -->
<?php
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCovidMenu.html';
    include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?>
      <h2><b>Vue app/view/innovation/viewUpdated</b></h2> 
    <!-- ===================================================== -->
    <?php
    echo("<div>");
     echo ("<h3>L'adresse du centre a été mise à jour </h3>");
     echo("<ul>");
     echo ("<li>Centre  = " . $centre[1] . "</li>");
     echo ("<li>Nouvelle adresse = " . $centre_adresse . "</li>");
     echo("</ul>");
    echo("</div>");
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    