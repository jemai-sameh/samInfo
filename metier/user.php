<?php
require_once __DIR__ .'/DataBase.php';

class user extends DataBase{

public function liste(){
    $rq="select id_u,name_u,prenom_u,adresse_u,code_postal,pays,telephone,dateNaiss,email,pwd,eole_u,recevoir_offre from user ";
    $user = $this->query($rq);
    return $user;
}
public function listeParEmail($email){
    $rq="select id_u,name_u,prenom_u,adresse_u,code_postal,pays,telephone,dateNaiss,email,pwd,role_u,recevoir_offre from user where email=:email ";
    
    $user = $this->query($rq,array('email'=>$email));
    return $user;
}

public function executer($param){
    $rq="INSERT INTO user(name_u,prenom_u,adresse_u,code_postal,pays,telephone,dateNaiss,email,pwd,role_u,recevoir_offre) VALUES (:name_u,:prenom_u,:adresse_u,:code_postal,:pays,:telephone,:dateNaiss,:email,:pwd,:role_u,:recevoir_offre)";
    $user=$this->execute($rq,$param);
    return $user;
}
}
?>