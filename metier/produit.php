<?php
require_once __DIR__ .'/DataBase.php';

class produit extends DataBase{

   
    public function liste(){
        $rq="select idp, nom,pu,qte,img,cat,caracteristique, couleur from produit ";
		
		$produit = $this->query($rq);
		return $produit;
    }
    public function listeParCategorie($cat){
        $rq="select idp, nom,pu,qte,img,cat,caracteristique, couleur from produit where cat=:cat";
		
		$produit = $this->query($rq,array($cat));
		return $produit;
    }
    public function listParId($idp){
        $rq="select idp, nom,pu,qte,img,cat,caracteristique, couleur from produit where idp=:idp ";
		
		$produit = $this->query($rq,array("idp"=>$idp));
		return $produit;
    }
   
}

?>