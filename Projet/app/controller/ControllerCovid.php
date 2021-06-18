
<!-- ----- debut ControllerCovid -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerCovid {
 // --- page d'acceuil
 public static function covidAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovidAccueil.php';
  if (DEBUG)
   echo ("ControllerVaccin : covidAccueil : vue = $vue");
  require ($vue);
 }
 
 // --- Page mes propositions
 public static function mesInnovations(){
     // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/public/documentation/mesInnovations.php';
  require ($vue);
     
 }

 
}
?>
<!-- ----- fin ControllerCovid -->


