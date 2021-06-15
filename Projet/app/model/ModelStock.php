
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
           . " stock.vaccin_id=vaccin.id ORDER by centre ";
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
   foreach ($vaccin_id as $id) {
        $query="select max(quantite) as doses from stock,centre,vaccin WHERE stock.centre_id=centre.id AND stock.vaccin_id=vaccin.id and vaccin.id='".$id."' AND centre.id='".$centre_id."' ";
        $statement = $database->prepare($query); $statement->execute();
        $results =$statement->fetchall(PDO::FETCH_COLUMN); $dose=$results['0'];
       if($dose==NULL){
            $query ="insert into stock value(:centre_id, :id, :quantite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'centre_id'=>$centre_id,'id'=>$id, 'quantite'=>$quantite[$id] 
            ]); }
        else{
            $quantite[$id]=$quantite[$id]+ $dose;
            $query2 = "update stock set quantite ='".$quantite[$id]."' where centre_id ='".$centre_id."' and vaccin_id ='".$id."'";
            $database->exec($query2);
   }} return 1;
      } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage()); $err[0]=$e->getCode();$err[1]=$e->getMessage();
   return $err;
  } }
  
  
  
  public static function update($centre_id,$vaccin_id,$quantite) {
   try {
        $database = Model::getInstance();
        $quantite--;
     $query = "update stock set quantite ='".$quantite."' where centre_id ='".$centre_id."' and vaccin_id ='".$vaccin_id."'";
        $database->exec($query);
      return 1;
     } catch (Exception $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return null;
     }
 }
 
 public static function getIdmax($centre_id) {
   try {
         $database = Model::getInstance();
   //Selectionner le vaccin qui  a le plus de doses dans le centre choisi
   $query = "select max(quantite) as doses from stock WHERE centre_id=:id ";
   $statement = $database->prepare($query);
   $statement->execute(['id' => $centre_id ]);
   $results = $statement->fetchAll(PDO::FETCH_COLUMN);
   $doses=$results['0'];
   $query2 = "select vaccin_id from stock WHERE quantite='". $doses."' and centre_id=:id ";
   $statement2 = $database->prepare($query2);
   $statement2->execute(['id' => $centre_id ]);
   $results2 = $statement2->fetchAll(PDO::FETCH_COLUMN);
   
    return array($results2['0'],$doses);
    
   } catch (Exception $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return null;
   }
 }
 
 public static function getQuantite($vaccin_id,$centre_id) {
  try {
   $database = Model::getInstance();
   $query="select quantite from stock,centre,vaccin WHERE stock.centre_id=centre.id"
           . " AND stock.vaccin_id=vaccin.id and vaccin.id=".$vaccin_id." and centre.id=".$centre_id." ";
   $statement = $database->prepare($query);
   $statement->execute();
   $datas= $statement->fetchAll(PDO::FETCH_ASSOC);
   return $datas;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }



}
?>
<!-- ----- fin Modelstock -->
