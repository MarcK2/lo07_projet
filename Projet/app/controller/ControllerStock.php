
<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelCentre.php';

class ControllerStock {
 

 // --- Liste des centre , caccins et doses
 public static function recolteReadAll() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
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
 




 // Affiche le formulaire de creation d'une récolte
 public static function recolteCreate($args) {
      if (DEBUG) echo ("ControllerRecolte : recolteCreate:begin</br>");
     $results[0]= ModelVin::getAll();
     $results[1]= ModelProducteur::getAll();
    
      $target= $args['target'];
   if (DEBUG) echo ("ControllerRecolte:recolteCreate: target= $target</br>");
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function recolteCreated() {
  // ajouter une validation des informations du formulaire
     $vin= explode(" : ", $_GET["vin"]);
     $producteur= explode(" : ", $_GET["producteur"]);
     
  
  $results = ModelRecolte::insert(htmlspecialchars($vin[0]),$producteur[0],$_GET["quantite"]);
 
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInserted.php';
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerVin -->

