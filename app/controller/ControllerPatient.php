
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient{
 

 // --- Liste des patients
 public static function patientReadAll() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  if (DEBUG)
   echo ("ControllerPatient : PatientReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function patientReadId($args) {
     if (DEBUG) echo ("ControllerPatient : PatientReadId:begin</br>");
  $results = ModelPatient::getAllId();
 
  $target= $args['target'];
   if (DEBUG) echo ("ControllerPatient:PatientReadId: target= $target</br>");
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }

 // Affiche un Patient particulier (id)
 public static function patientReadOne() {
  $patient_id = $_GET['id'];
  $results = ModelPatient::getOne($patient_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un Patient
 public static function patientCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau Patient.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function patientCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelPatient::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']) );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInserted.php';
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerPatient -->


