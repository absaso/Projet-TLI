<?php
    include_once('../config/init.php');
    require ('../ctr/patho.php');
    
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    function getPatho()
    {
        $sql = "SELECT patho.desc, patho.idP FROM patho ORDER BY patho.desc ASC";
        $PdoStatement = $bdd->prepare($sql);
        $status = $PdoStatement->execute();
        if($status == false) var_dump($PdoStatement->errorInfo());
        $pathoResults = $PdoStatement->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($pathoResults, JSON_PRETTY_PRINT);
        
    }
   

    switch($request_method)
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
        getPatho();
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

    
  $query1 = "SELECT symptome.desc, patho.idP 
  FROM symptome
  JOIN symptPatho ON symptome.idS = symptPatho.idS
  JOIN patho ON patho.idP = symptPatho.idP
  ORDER BY symptome.desc ASC";

  $symptResults = getDB($query1,$bdd);
  header('Content-Type: application/json');
  echo json_encode($symptResults, JSON_PRETTY_PRINT);





    


    


 
?>