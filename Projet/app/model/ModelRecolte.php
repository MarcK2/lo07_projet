
<!-- ----- debut ModelRecolte -->

<?php
require_once 'Model.php';


class ModelRecolte {
 private  $vin_id,$producteur_id, $quantite;

 
 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from vin";
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
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select region, cru, annee, degre, nom, prenom, quantite from vin,
            producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id =
            producteur.id order by region";
   $statement = $database->prepare($query);
   $statement->execute();
   $colcount=$statement->columnCount();
   $cols=array();
   $datas=array();
   for($i=0;$i<$colcount;$i++)
      {
        $cols[$i]=$statement->getColumnMeta($i)['name']; 
      }
   $datas= $statement->fetchAll(PDO::FETCH_ASSOC);
   
   $query = "select vin.id , producteur.id, region, cru, nom, prenom, quantite from vin,"
           . " producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id"
           . " = producteur.id order by vin.id, producteur_id";
   $statement2 = $database->prepare($query);
   $statement2->execute();
   $colcount2=$statement2->columnCount();
   $cols2=array();
   $datas2=array();
   for($i=0;$i<$colcount2;$i++)
      {
        $cols2[$i]=$statement2->getColumnMeta($i)['name']; 
      }
   $datas2= $statement2->fetchAll(PDO::FETCH_NUM);
   
   return array($cols,$datas,$cols2,$datas2);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;
  }
 }


 
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($vin_id, $producteur_id, $quantite) {
  try {
   $database = Model::getInstance();
   $requete2="select count(vin_id) as nb from recolte where vin_id='".$vin_id."' and producteur_id='".$producteur_id."'";
     $res=$database->query($requete2);
     $nombre=$res->fetch(PDO::FETCH_ASSOC);
     if($nombre["nb"]>0){
          $query = "update recolte set quantite='".$quantite."' where vin_id='".$vin_id."' and producteur_id='".$producteur_id."'";
   $database->exec($query);
   return 0;
       }
   elseif($nombre["nb"]==0){
       $query = "insert into recolte value ( :producteur_id,:vin_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
       'vin_id' => $vin_id,
     'quantite' => $quantite 
   ]);
   return 1 ;
   }
     }
    
  catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;}
 }

  public static function update() {
  
 }



}
?>
<!-- ----- fin ModelRecolte -->
