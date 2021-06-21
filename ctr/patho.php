<?php
    include_once('../config/init.php');
    
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    global $bdd;

    function getPathos()
    {
        global $bdd;
        $sql = "SELECT patho.desc, patho.idP FROM patho ORDER BY patho.desc ASC";
        $PdoStatement = $bdd->prepare($sql);
        $status = $PdoStatement->execute();
        if($status == false) var_dump($PdoStatement->errorInfo());
        $pathoResults = $PdoStatement->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($pathoResults, JSON_PRETTY_PRINT);
        
    }

    function getPatho($idP=0)
    {
        global $bdd;
        $sql = "SELECT patho.desc, patho.idP FROM patho WHERE idP = ".$idP." LIMIT 1 ORDER BY patho.desc ASC";
        $PdoStatement = $bdd->prepare($sql);
        $status = $PdoStatement->execute();
        if($status == false) var_dump($PdoStatement->errorInfo());
        $pathoResults = $PdoStatement->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($pathoResults, JSON_PRETTY_PRINT);
    }
   

    switch($requestMethod)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Afficher une pathologie spécifique
        $id = intval($_GET["idP"]);
        getPatho($id);
      }
      else
      {
        // Afficher toutes les pathologies
        getPathos();
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

    





    


    


 
?>