
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
      <h2><b>Vue app/view/patient/viewInserted</b></h2> 
    <!-- ===================================================== -->
    <?php
    if ($results>0) {
     echo ("<h3>Le nouveau patient a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>Id = " . $results . "</li>");
     echo ("<li>Nom = " . $_GET['nom'] . "</li>");
     echo ("<li>Prénom = " . $_GET['prenom'] . "</li>");     
     echo ("<li>Adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du patient</h3>");
     echo ("nom = " . $_GET['nom']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    