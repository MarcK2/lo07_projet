
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
  $vue = $root . '/app/view/innovation/viewCentreId.php';
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
 
 public static function choosePatient() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewPatientId.php';
  if (DEBUG)
   echo ("ControllerInnovation : choosePatient : vue = $vue");
  require ($vue);
 }
 
 public static  function ShowRdv(){
    $patient =explode(' : ',$_GET['patient']);
   $patient_id=$patient[0];
   $res=ModelRendezvous::getSituation($patient_id);
   $situation=$res[0][0];
   if($situation>0){
     $query="select nom,prenom,centre.label as centre,vaccin.label as vaccin,max(injection) from centre,
              vaccin,rendezvous,patient WHERE rendezvous.centre_id=centre.id AND
              rendezvous.vaccin_id=vaccin.id and patient.id=rendezvous.patient_id 
              and patient.id=".$patient_id." ";
     $results= ModelRendezvous::getMany($query);    
include 'config.php';     
  $vue = $root . '/app/view/innovation/viewDeleteRdv.php';
  if (DEBUG)
   echo ("ControllerInnovation : ShowRdv : vue = $vue");
  require ($vue);     
   }
 }
 
 public static function DeleteRdv(){
     $patient_id=$_GET["patient_id"];
     //$centre_id= ;
     $injection=$_GET["injection"]  ;
     $vaccin_id=$_GET["vaccin_id"];
     $choice=$_GET["choix"];
     if($choice=='YES'){
          $query="select quantite in stock where centre_id='".$centre_id."' and vaccin_id='".$vaccin_id."'";
     $resu= ModelStock::getMany($query);
     $quantite=$resu[0][0]["quantite"];
     $quantite=$quantite+2;
      $results=ModelRendezvous::delete($patient_id, $vaccin_id, $centre_id, $injection);
     $res= ModelStock::update($centre_id, $vaccin_id, $quantite);
     }
     
    
     
     $vue = $root . '/app/view/innovation/viewDeleted.php';
  if (DEBUG)
   echo ("ControllerInnovation : DeletedRdv : vue = $vue");
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


