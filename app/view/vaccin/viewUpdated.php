
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
      <h2><b>Vue app/view/vaccin/viewUpdated</b></h2> 
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le vaccin a été mis à jour </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     //echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>doses = " . $_GET['doses'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de mise à jour du Vaccin</h3>");
     //echo ("id = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    