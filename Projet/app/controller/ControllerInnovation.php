
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
 
 
 
}
?>
<!-- ----- fin ControllerInnovation -->


