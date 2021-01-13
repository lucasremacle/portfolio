<?php
require_once "params.php";


if (isset($_GET['action']) && $_GET['action'] == 'deconnection') { //si "action" est dans l'url et qu'il a pour valeur "déconnexion", c'est que le membre a cliqué sur "Déconnexion".
    unset($_SESSION['membre']); // on vide la session de sa partie "membre" tout en concervant l'eventuelle partie "panier". 
   header('location:authentification.php');
}

