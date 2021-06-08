
<!-- ----- debut ModelRecolte -->

<?php
require_once 'Model.php';


class ModelStock {
 private  $centre_id,$vaccin_id, $quantite;

 
 
// retourne une liste des id
 

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
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
   return array($cols,$datas);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select centre.label as centre,vaccin.label as vaccin,quantite as "
           . "doses from stock,centre,vaccin WHERE stock.centre_id=centre.id AND"
           . " stock.vaccin_id=vaccin.id ORDER by centre";
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
   
   
   
   return array($cols,$datas);
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
