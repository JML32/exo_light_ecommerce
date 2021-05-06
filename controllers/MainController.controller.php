<?php

require_once("models/MainManager.model.php");

class MainController{
    private $mainManager;

    public function __construct(){
        $this->mainManager = new MainManager();
    }

    private function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function accueil(){
        $datas = $this->mainManager->getDatasProduits();

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Decouvrez nos produits les plus vendus",
            "datas" => $datas,
            "page_css" => ["accueil.css"],
            "view" => "views/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function listeproduits(){
        $datasProduits = $this->mainManager->getDatasProduits();
        $datasCategorie = $this->mainManager->getDatasCategories();

        $data_page = [
            "page_description" => "Liste des produits",
            "page_title" => "Liste des produits",
            "datas" => [$datasProduits,$datasCategorie],
            "page_css" => ["listeproduits.css"],
            "view" => "./views/listeproduits.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function produit($NumProd){
        $datasProduit = $this->mainManager->getDatasProduit($NumProd);

        $data_page = [
            "page_description" => "Détail du produit",
            "page_title" => "Détail du produit",
            "datas" => $datasProduit,
            "page_css" => ["produit.css"],
            "view" => "./views/produit.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function listeproduitsparcategorie($categorie){
        $datasProduits = $this->mainManager->getDatasProduitsparcategorie($categorie);
        $datasCategorie = $this->mainManager->getDatasCategories();

        $data_page = [
            "page_description" => "Liste des produits",
            "page_title" => "Liste des produits",
            "datas" => [$datasProduits,$datasCategorie],
            "page_css" => ["listeproduits.css"],
            "view" => "./views/listeproduits.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }



    public function contact(){
        $data_page = [
            "page_description" => "Contact",
            "page_title" => "Contact",
            "page_javascript" => ["page3.js"],
            "view" => "./views/contact.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function panier(){
        $data_page = [
            "page_description" => "Contenu du panier",
            "page_title" => "Contenu du panier",
            "page_css" => ["panier.css"],
            "page_javascript" => ["page3.js"],
            "view" => "./views/panier.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function connexion(){
        $data_page = [
            "page_description" => "Connexion",
            "page_title" => "Connexion",
            "page_css" => ["inscription.css"],
            "page_javascript" => ["page3.js"],
            "view" => "./views/connexion.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function deconnexion(){
        $data_page = [
            "page_description" => "Déconnexion",
            "page_title" => "Déconnexion",
            "page_css" => ["inscription.css"],
            "page_javascript" => ["page3.js"],
            "view" => "./views/deconnexion.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function inscription(){
        $data_page = [
            "page_description" => "Inscription",
            "page_title" => "Inscription",
            "page_css" => ["inscription.css"],
            "page_javascript" => ["page3.js"],
            "view" => "./views/inscription.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }




    public function pageErreur($msg){
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}