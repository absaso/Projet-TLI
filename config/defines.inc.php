<?php

// Si on a pas ces infos, rien ne peut fonctionner : die
if (!isset($_SERVER['DOCUMENT_ROOT']))
    die();

// Define de la racine du site
define('_PATH_', $_SERVER['DOCUMENT_ROOT'].'/');

// Define du dossier des Controleurs
define('_CTRL_', _PATH_ . 'ctr/');

// Define du dossier de la classe dataB
define('_CLASS_', _PATH_ . 'class/');

// Define du dossier des Configs
define('_CONFIG_', _PATH_ . 'config/');


?>