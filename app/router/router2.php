
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerCovid.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRendezvous.php');
require ('../controller/ControllerInnovation.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

 // Modification du routeur pour prendre en compte l'ensemble des parametres
$action= $param["action"];

//On supprime l'action de la structure
unset($param['action']);

//Tout ce qui reste sont des arguments
$args=$param;


// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinReadOne" :
 case "vaccinReadId" :
 case "vaccinCreate" :
 case "vaccinCreated" :
 case "vaccinUpdate" :
 case "vaccinUpdated" :
     //Passage des arguments au controlleur 
     ControllerVaccin::$action($args);
  break;
case "centreReadAll" :
 case "centreReadOne" :
 case "centreReadId" :
 case "centreCreate" :
 case "centreCreated" :
     //Passage des arguments au controlleur 
     ControllerCentre::$action($args);
  break;

case "patientReadAll" :
 case "patientReadOne" :
 case "patientReadId" :
 case "patientCreate" :
 case "patientCreated" :
     //Passage des arguments au controlleur 
     ControllerPatient::$action($args);
  break;

case "stockReadAll" :
 case "stockReadDose" :
 case "stockCreate" :
 case "stockCreated" :
     //Passage des arguments au controlleur 
     ControllerStock::$action($args);
  break;
case "rendezvousReadAll" :
 case "rendezvousReadId" :
 case "rendezvousReadOne" :
 case "rendezvousFirstInsert":
 case "rendezvousInsert":
     //Passage des arguments au controlleur 
     ControllerRendezvous::$action($args);
  break;
 case "chooseCentre" :
 case "ReadOneCentre" :
 case "chooseVaccin" :
 case "totalVaccin" :
 case "centreUpdate":
     case "centreUpdated":
 case "documentation1":
 case "documentation2":
 case "documentation3":
 case "documentation4":
     
     //Passage des arguments au controlleur 
     ControllerInnovation::$action($args);
  break;
  

 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCovid::$action();
}
?>
<!-- ----- Fin Router2 -->

