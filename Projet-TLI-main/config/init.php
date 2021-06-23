<?php

// Initialisation de la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Chargement Defines
require_once('defines.inc.php');

// Connexion Database
try {
    $bdd = new PDO("pgsql:host=localhost;port=5432;dbname=acudb", "postgres-tli", "tli");
}
catch (PDOException $e) {
    echo 'Un erreur s\'est produite';
    die();
}