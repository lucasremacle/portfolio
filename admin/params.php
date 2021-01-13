<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=cite_cv_lucas;charset=utf8', 'root', '');
    
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
define('RACINE_SITE','/site-lucas/');
session_start();
