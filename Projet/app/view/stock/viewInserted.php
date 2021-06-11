
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
    <!-- ===================================================== -->
    <?php
    if ($results== 1) {
     echo ("<h3>Les doses ont été ajoutées </h3>");
     echo("<ul>");
     
     echo("</ul>");
    } 
    else {
     echo ("<h3>Il y a un soucis</h3>");
     echo("<pre>");
     print_r($results);
     echo("</pre>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

   
