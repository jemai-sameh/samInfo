<?php
class image{

    public function __construct(){
        $bd=new PDO('mysql:host=localhost;dbname=saminfo','root','');

    }
    public function upload(){
        $rq='select id,img from produit where id=:id ;';
        $req = $bd->prepare($rq);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        
    }

    public function implode(){

    }


}


?>