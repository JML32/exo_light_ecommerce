<?php
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

require_once("./controllers/MainController.controller.php");
$mainController = new MainController();

try {
    if(empty($_GET['page'])){
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
        }

    switch($page){
        case "accueil" : $mainController->accueil();
        break;
        case "listeproduits" :
            if (!isset($url[1])){
                $mainController->listeproduits();
            }
            if (isset($url[1])){
                $mainController->listeproduitsparcategorie($url[1]);
            }
        break;
        case "produit" : $mainController->produit($url[1]);
        break;
        case "contact" : $mainController->contact();
        break;
        case "panier" : $mainController->panier();
        break;
        case "connexion" : $mainController->connexion();
        break;
        case "deconnexion" : $mainController->deconnexion();
        break;
        case "inscription" : $mainController->inscription();
        break;
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $mainController->pageErreur($e->getMessage());
}

