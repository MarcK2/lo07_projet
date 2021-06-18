
<!-- ----- debut ControllerInnovation -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelCentre.php';

 class ControllerInnovation {
 
 public static function chooseCentre() {
  $results = ModelCentre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewId.php';
  if (DEBUG)
   echo ("ControllerInnovation : chooseCentre : vue = $vue");
  require ($vue);
 }
 
 public static function ReadOneCentre() {
   $centre =explode(' : ',$_GET['centre']);
   $centre_id=$centre[0];
   $label=$centre[1];
   $adresse=$centre[2];
   $query="select vaccin.label as Vaccin,doses as Injections_necessaires,quantite"
           . " as Quantites_disponibles from stock,vaccin,centre where centre.id=centre_id"
           . " and vaccin.id=vaccin_id and centre.id='".$centre_id."'";
   $results= ModelStock::getMany($query);
   
   $query2="select nom,prenom,vaccin.label as vaccin ,injection from vaccin,centre,patient, rendezvous "
           . "where centre.id=centre_id and vaccin.id=vaccin_id and centre.id='".$centre_id."' "
           . "and patient_id=patient.id order by nom";
   $results2= ModelStock::getMany($query2);
   
   $res= ModelCentre::getMany("select sum(quantite)as total from stock,vaccin,centre "
           . "where centre.id=centre_id and vaccin.id=vaccin_id and centre.id='".$centre_id."'");
   $total=$res[0];
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewOne.php';
  if (DEBUG)
   echo ("ControllerInnovation : ReadOneCentre : vue = $vue");
  require ($vue);
 }
 
 
 
 // Affiche le formulaire de choix d'un vaccin
public static function chooseVaccin() {
  $results = ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewChooseVaccin.php';
  if (DEBUG)
   echo ("ControllerInnovation : chooseVaccin : vue = $vue");
  require ($vue);
 }
 
 //Affiche le formulaire pour recuperer les informations du vaccin (nombre de doses totales)
 // La clé est gérée par le systeme et pas par l'internaute
 public static function totalVaccin() {
  // ajouter une validation des informations du formulaire
  $vaccin_id=explode(" : ",$_GET['vaccin']);
  $resultat = ModelStock::getDose($vaccin_id[0]);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewTotalVaccin.php';
  require ($vue);
 }
 
 
 public static function documentation1() {
  
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewInnovation1.php';
  require ($vue);
 }
 
 public static function documentation2() {
  
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewInnovation2.php';
  require ($vue);
 }
 
 public static function documentation3() {
  
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewInnovation3.php';
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerInnovation -->


