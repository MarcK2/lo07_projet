
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
    <?php
    $vin= explode(" : ", $_GET["vin"]);
     $producteur= explode(" : ", $_GET["producteur"]);
    if ($results==1) {
     echo ("<h3><b>La nouvelle récolte a été ajoutée</b> </h3>");
     echo("<ul>");
     echo ("<li>vin_id = " . $vin[0] . "</li>");
     echo ("<li>producteur_id = " . $producteur[0] . "</li>");
     echo ("<li>quantite = " . $_GET["quantite"] . "</li>");
     
     echo("</ul>");
    } elseif($results==0) {
    echo ("<h3><b>La  récolte a été mise à jour</b></h3>");
     echo("<ul>");
     echo ("<li>vin_id = " .  $vin[0]  . "</li>");
     echo ("<li>producteur_id = " . $producteur[0] . "</li>");
     echo ("<li>quantite = " . $_GET["quantite"] . "</li>");
     echo("</ul>");
    }
    else{
      echo ("<h3><b>Problème</b></h3>");   
    }
    echo("</div>");
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    