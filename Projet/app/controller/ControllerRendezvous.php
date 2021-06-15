
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelPatient.php';
require_once '../model/ModelRendezvous.php';
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';

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
  //patient[0]=patient_id
  // ----- Construction chemin de la vue
  include 'config.php';
  if($situation[0][0]==0){
     $results[0]= ModelRendezvous::setFirstRdv(); 
     $results[1]=$patient[0];
     $results[2]=$situation[0][0];
  }
  elseif($situation[0][0]>0){ // situation[0][0]=nombre d'injection ; situation[0][1]=vaccin_id
      $query="select nom,prenom,centre.label as centre,vaccin.label as vaccin,injection from centre,
              vaccin,rendezvous,patient WHERE rendezvous.centre_id=centre.id AND
              rendezvous.vaccin_id=vaccin.id and patient.id=rendezvous.patient_id 
              and patient.id=".$patient[0]." ";
          $tab= ModelRendezvous::getMany($query);
     $det= ModelRendezvous::needSup($situation[0][0], $situation[0][1]);
      if($det==1){
          $results[0]= ModelRendezvous::setOtherRdv($situation[0][1]);
          $results[1]=$patient[0];
          $results[3]=$situation[0][1];
          $results[4]=$situation[0][0];
          
      }
      elseif($det==-1){// Afficher la situation vaccinale du patient
         
      }
      $results[2]=$det;
  }
  
  $vue = $root . '/app/view/rendezvous/viewChooseCentre.php';
  require ($vue);
 }

 
 
 
 public static function rendezvousFirstInsert() {
  
    $centre= explode(" : ", $_GET["centre"]);
    $centre_id=$centre[0];
    $vaccin= ModelStock::getIdmax($centre_id); // vaccin[0]=vaccin_id , vaccin[1]= doses
    $confirm= ModelRendezvous::putFirstRdv($centre_id,$_GET["patient_id"],$vaccin[0]);
    $bof= ModelStock::update($centre_id,$vaccin[0],$vaccin[1]);
    $label= ModelVaccin::getOne($vaccin[0]);
    $lab=$label[0];
     $label1= ModelCentre::getOne($centre_id);
    $lab1=$label1[0];
    $results =array($centre_id,$_GET["patient_id"],$lab[1],0,$lab1[1]) ;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rendezvous/viewRdvfixed.php';
  require ($vue);
 }
 
 
 public static function rendezvousInsert() {
  
    $centre= explode(" : ", $_GET["centre"]);
    $centre_id=$centre[0];
    $patient_id=$_GET["patient_id"];
    $vaccin_id=$_GET["vaccin_id"];
    $injection=$_GET["injection"];
    $injection++;
    $confirm= ModelRendezvous::putRdv($centre_id,$patient_id,$vaccin_id,$injection);
    $res= ModelStock::getQuantite($vaccin_id, $centre_id);
    $bof= ModelStock::update($centre_id,$vaccin_id,$res["quantite"]);
    $label= ModelVaccin::getOne($vaccin_id);
    $lab=$label[0];
     $label1= ModelCentre::getOne($centre_id);
    $lab1=$label1[0];
    $results =array($centre_id,$_GET["patient_id"],$lab[1],1,$lab1[1],$injection) ;
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


