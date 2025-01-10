<?php
require_once __DIR__ .'/DataBase.php';

class commande extends DataBase{

   
    public function liste(){
        $rq="select idc,jour,idcl,id_p,qte_c,livraison from commande ";
		
		$commande = $this->query($rq);
		return $commande;
    }
    public function listParIdcl($idcl){
        $rq="select idc,jour,idcl,id_p,qte_c,livraison,payment from commande where idcl=:idcl";
		
		$commande = $this->query($rq,array($idcl));
		return $commande;
    }
    public function executer($param){
        $rq="INSERT INTO commande(jour,idcl,id_p,qte_c,livraison) VALUES (:jour,:idcl,:id_p,:qte_c,:livraison)";
        $commande=$this->execute($rq,$param);
        return $commande;
    }
   
}

?>