
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
      <h2><b>Vue app/view/centre/viewInserted</b></h2> 
    <!-- ===================================================== -->
    <?php
    if ($results>0) {
     echo ("<h3>Le nouveau centre a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>Id = " . $results . "</li>");
     echo ("<li>Nom du centre = " . $_GET['label'] . "</li>");
     echo ("<li>Adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du centre</h3>");
     echo ("id = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    