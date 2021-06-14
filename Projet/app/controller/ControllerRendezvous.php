
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelPatient.php';
require_once '../model/ModelRendezvous.php';

class ControllerRendezvous {
 

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
 public static function rendezvousReadId() {
     if (DEBUG) echo ("ControllerRendezvous : rendezvousReadId:begin</br>");
  $results = ModelPatient::getAll();
  
 
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rendezvous/viewId.php';
  require ($vue);
 }

 // Affiche la situation d'un patient (id)
 public static function rendezvousReadOne() {
  $patient =explode(' : ',$_GET['patient']);
  $situation=ModelRendezvous::getSituation($patient[0]);
  
  // ----- Construction chemin de la vue
  include 'config.php';
  if($situation[0]==0){
     $results[0]= ModelRendezvous::setFirstRdv(); 
     $results[1]=$patient[0];
     $results[2]=$situation[0];
  }
  elseif($situation[0]==1){
     
      $results[1]=$patient[0];
      $results[2]=$situation[0];
  }
  else{
     
       
         $results[1]=$patient[0];
           $results[2]=$situation;
  }
  $vue = $root . '/app/view/rendezvous/viewChooseCentre.php';
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
 
 public static function rendezvousFirstInsert() {
  
      $centre= explode(" : ", $_GET["centre"]);
      
  $result = ModelRendezvous::putFirstRdv($centre[0],$_GET["patient_id"]);
  $bof= ModelStock::update($centre[0],$result["vaccin_id"],$result["doses"]);
   $results =array($centre[0],$_GET["patient_id"],$result["vaccin.label"],0) ;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rendezvous/viewRdvfixed.php';
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


