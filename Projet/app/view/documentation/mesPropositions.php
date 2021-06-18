
<!-- ----- mes proposition-->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 
    <div class="panel panel-primary" id="2">
        <div class="panel-heading">Innovqtion 2 : </div>
        <div class="panel-body ">       
        <p> On pourrait par exemple enlever les balises fermantes " ?> " dans les pages qui n'ont que du PHP 
         afin d'éviter que ces fichiers créent une erreur (code HTML sous forme d'espaces blancs). <p/>
        </div>
    </div>
    <div class="panel panel-primary" id="2">
        <div class="panel-heading">Proposition d'amélioration :</div>
        <div class="panel-body ">       
        <p>Quelque chose qu'il serait utile de modifier serait le router afin de supprimer un vin ou un producteur,
        il faudrait par contre securiser en quelque sorte la base de donnée (à l'aide d'un mot de passe par exemple) pour empecher que n'importe
        qui modifie la base de donnée. Il pourrait egalement être utile de demander une confimation avant de modifier une base de donnée afin
        d'éviter des erreurs.<p/>
        </div>
    </div>


  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
      
</body>
</html>
<!-- ----- fin proposition -->


