
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results== 1) {
     echo ("<h3>Les doses ont été ajoutées </h3>");
     echo("<ul>");
     echo ("<li>centre_id = " . $_GET['centre_id'] . "</li>");
     echo ("<li>vaccin_id = " . $_GET['vaccin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    } 
    else {
     echo ("<h3>Il y a un soucis</h3>");
     echo("<ul>");
     echo ("<li>centre_id = " . $_GET['centre_id'] . "</li>");
     echo ("<li>vaccin_id = " . $_GET['vaccin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

   
