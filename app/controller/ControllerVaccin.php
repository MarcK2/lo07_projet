
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
 

 // --- Liste des vaccins
 public static function vaccinReadAll() {
  $results = ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vaccinReadId($args) {
     if (DEBUG) echo ("ControllerVaccin : vaccinReadId:begin</br>");
  $results = ModelVaccin::getAllId();
  // Passage du nom de la méthode coble pour le champs d'action du formulaire
  //Solution 1 : VinReadOne
  // Solution 2 : VinDeleted
  $target= $args['target'];
   if (DEBUG) echo ("ControllerVaccin:vaccinReadId: target= $target</br>");
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewId.php';
  require ($vue);
 }

 // Affiche un vaccin particulier (id)
 public static function vaccinReadOne() {
  $vaccin_id = $_GET['id'];
  $results = ModelVaccin::getOne($vaccin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vaccin
 public static function vaccinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vaccinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVaccin::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']) );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInserted.php';
  require ($vue);
 }
 
 public static function vaccinUpdate() {
  // Update d'un vaccin 
  $results =ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewUpdate.php';
  require ($vue);
 }
 
  public static function vaccinUpdated() {
  // Update d'un vaccin
      $vaccin= explode(" : ", $_GET["vaccin"]);
      
  $results = ModelVaccin::update($vaccin[0],$_GET["doses"]);
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewUpdated.php';
  require ($vue);
 }
 
 public static function vaccinDeleted() {
  // Suppression d'un vaccin
    $vaccin_id = $_GET['id']; 
  $results = ModelVin::delete($vaccin_id);
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewDeleted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


