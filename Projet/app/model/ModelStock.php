
<!-- ----- debut Modelstock -->

<?php
require_once 'Model.php';


class ModelStock {
 private  $centre_id, $vaccin_id, $quantite;

 
 
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
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($centre_id, $vaccin_id, $quantite) {
  try {
       $database = Model::getInstance();
   // Ajout d'un nouveau tuple
   foreach ($vaccin_id as $id) {
       $query="select max(quantite) as doses "
           . " from stock,centre,vaccin WHERE stock.centre_id=centre.id AND"
           . " stock.vaccin_id=vaccin.id and vaccin.id='".$id."' AND centre.id='".$centre_id."' ";
       $statement = $database->prepare($query);
   $statement->execute();
   $results =$statement->fetchall();
  if(($results["0"]==NULL)||($results["0"]==0)){
      $query ="insert into stock value(:centre_id, :id, :quantite)";
  $statement = $database->prepare($query);
  $statement->execute([
      'centre_id'=>$centre_id,
      'vaccin_id'=>$id,
      'quantite'=>$quantite[$id]
  ]);
   }
   else{
   $quantite[$id]+=$results["0"];
     $query2 = "update stock set quantite = :quantite where centre_id =:centre_id and vaccin_id = :id";
        $statement2 = $database->prepare($query2);
         $statement2->execute([
           'centre_id'=>$centre_id,
          'vaccin_id'=>$id,
          'quantite'=>$quantite[$id]
        ]);
   }
   }
  
    return 1;
    
      } catch (PDOException $e) {
       
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return array($centre_id,$quantite,$vaccin_id);

  }
 }
  
  public static function update() {
  
 }



}
?>
<!-- ----- fin Modelstock -->
