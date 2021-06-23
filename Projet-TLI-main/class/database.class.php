<?php
include_once('../config/init.php');

//keywords (idK, "name");
//keySympt (idK, idS)
//meridien (code, nom, element, yin)
//patho (idP, mer, "type", "desc")
//symptome (idS, "desc")
//symptPatho(idS, idP, aggr)

class database
{
  private $bdd;

  public function const(){
    try {
      $this->bdd = new PDO("pgsql:host=localhost;port=5432;dbname=acudb", "postgres-tli", "tli");
    }
    catch (PDOException $e) {
        echo 'Un erreur s\'est produite';
        die();
    }
  
  }

  public function postdb($query, $values) {
      $statement = $this->bdd->prepare($query);
      $statement->execute($values);
  }

  public function getdb($query) {
    $PdoStatement = $this->bdd->prepare($query);
    $status = $PdoStatement->execute();
    if($status == false) var_dump($PdoStatement->errorInfo());
    return $PdoStatement->fetchAll(PDO::FETCH_ASSOC);

  }
}
?>
