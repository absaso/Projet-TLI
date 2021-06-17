<?php
    require('../config/init.php');
    $request_method = $_SERVER["REQUEST_METHOD"];
    
    function getDB($q,$bdd)
    {
        $PdoStatement = $bdd->prepare($q);
        $status = $PdoStatement->execute();
        if($status == false) var_dump($PdoStatement->errorInfo());
        return $PdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    $query1 = "SELECT symptome.desc, patho.idP 
    FROM symptome
    JOIN symptPatho ON symptome.idS = symptPatho.idS
    JOIN patho ON patho.idP = symptPatho.idP
    ORDER BY symptome.desc ASC";

    $symptResults = getDB($query1,$bdd);
    header('Content-Type: application/json');
    echo json_encode($symptResults, JSON_PRETTY_PRINT);


    $query2 = "SELECT patho.desc, patho.idP 
    FROM patho
    ORDER BY patho.desc ASC";

    $pathoResults = getDB($query2,$bdd);
    header('Content-Type: application/json');
    echo json_encode($pathoResults, JSON_PRETTY_PRINT);


 
?>