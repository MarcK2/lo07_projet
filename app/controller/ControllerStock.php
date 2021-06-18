
<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelCentre.php';

class ControllerStock{
 

 // --- Liste des centre , vaccins et doses
 public static function stockReadAll() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 //
 public static function stockReadDose() {
  $results = ModelStock::getMany("select label,sum(quantite)as doses from stock,centre "
          . "WHERE stock.centre_id=centre.id GROUP by label ORDER by doses DESC");
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock :stockReadDose : vue = $vue");
  require ($vue);
 }
 




 // Affiche le formulaire de creation d'un stock
 public static function stockCreate($args) {   
     $target= $args['target'];
      
     $results = ModelCentre::getAll();
     $resultsvaccin = ModelVaccin::getAll();
         
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau stock.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function stockCreated() {
  // ajouter une validation des informations du formulaire
     $vaccin_id= ModelVaccin::getAllId();
     $centre=explode(" : ",$_GET["centre"]);
     $quantite=$_GET["quantite"];
       $results = ModelStock::insert($centre[0], $vaccin_id, $quantite );
       
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerStock -->


