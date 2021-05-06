<?php
require_once("Model.class.php");

class MainManager extends Model{

    public function getDatasProduits(){
        $req = $this->getBdd()->prepare("SELECT * FROM produit");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getDatasProduit($NumProd){
        $req = $this->getBdd()->prepare("SELECT * FROM produit WHERE NumProd = :NumProd");
        $req->execute(array(
            ':NumProd' => $NumProd
        ));
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getDatasProduitsparcategorie($categorie){
        $req = $this->getBdd()->prepare("SELECT * FROM `produit` 
                                         WHERE categorie = :categorie");

        $req->execute(array(
            ':categorie' => $categorie
        ));
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }




    public function getDatasCategories(){
        $req = $this->getBdd()->prepare("SELECT * FROM categorie");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }


}