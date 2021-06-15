
<!-- ----- debut ModelRendezvous -->

<?php
require_once 'Model.php';


class ModelRendezvous {
 private $centre_id, $patient_id, $injection,$vaccin_id;

 // pas possible d'avoir 2 constructeurs


 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }
 
 function setPatient_id($patient_id) {
  $this->patient_id = $patient_id;
 }

 function setInjection($injection) {
  $this->injection = $injection;
 }
 
 function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }

 

function getCentre_id() {
  return $this->centre_id ;
 }
 
 function getPatient_id() {
  return $this->patient_id ;
 }

 function getInjection() {
  return $this->injection;
 }
 
 function getVaccin_id() {
  return $this->vaccin_id ;
 }
 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from vaccin order by id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
  //Obtenir le nbre de doses injectées au patient
 public static function getSituation($patient_id) {
  try {
   $database = Model::getInstance();
   $query = "select max(injection),vaccin_id from rendezvous where patient_id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $patient_id
   ]);
   $results= $statement->fetchall(pdo::FETCH_COLUMN);
   
  if($results==null){
      $results=0;
  } 
  return $results;
  
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //Liste des centre ayant au moins une dose pour une premiere vaccination
 public static function setFirstRdv() {
  try {
   $database = Model::getInstance();
   $query = "select label,centre_id from stock,centre WHERE "
           . "stock.centre_id=centre.id and quantite >0 GROUP by label ORDER by centre_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
 
 // Mettre le 1er rdv
 public static function putFirstRdv($centre_id,$patient_id,$vaccin_id) {
  try {
   $database = Model::getInstance();
   
   //Inserer le patient dans la liste des rdv
  $query2 = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
   $statement2 = $database->prepare($query2);
   $statement2->execute([
     'centre_id' => $centre_id,
     'patient_id' => $patient_id,
     'injection' => 1,
     'vaccin_id' => $vaccin_id
           ]);
   
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }}

 public static function insert($label,$doses) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from vaccin";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into vaccin value (:id, :label, :doses)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'doses' => $doses
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update($id,$doses) {
    try {
        $database = Model::getInstance();
      $query = "update vaccin set doses='".$doses."' where id='".$id."'";
      $database->exec($query);
      return $id;
     } catch (Exception $ex) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return null;
     }
 }
 
 public static function delete($id) {
   try {
   $database = Model::getInstance();
   $query = "Delete from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin ModelRendezvous -->
