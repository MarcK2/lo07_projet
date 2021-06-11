
<!-- ----- début viewAddition -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 
      <h2><b>Vue app/view/stock/viewInsert</b></h2> 
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='stockCreated'>        
        
        <label for="id">Selectionner un centre : </label>
        <select type="select" name='centre_id' size='1' value='centre'>
            <?php // La liste des centres est dans une variable $results             
                foreach ($results as $element) {
                echo "<option>"; 
                printf("<tr><td>%d</td> : <td>%s</td> : <td>%s</td></tr>", $element->getId(), 
                $element->getLabel(), $element->getAdresse());
                echo "</option>";
                }
          ?>
        </select></br> </div>
        
       <?php //for ($i = 1; $i <= $_GET[$nombre]; ++$i){
           foreach ($resultsvaccin as $element) {
                echo "<label for='id'>Nom du vaccin : </label>";
                printf("<tr><td> %s </td></tr>", $element->getLabel());
                echo "   ->   ";
           echo "<label for='id'> Doses ajoutées :  </label><input type='number' name='quantite[".$element->getId()."]' value='1'>";
           echo "</br>";
       }
        ?>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewAddition -->



