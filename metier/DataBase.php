<?php
class DataBase{
	private $connex;
    
    public 	function __construct(){
        $this->connex=new PDO('mysql:host=localhost;dbname=saminfo','root','');
    }

    public function query($rq,$param=array())
    {/*

         if(count($param)){
             $stm$this->connex->prepare($rq);
             $retour =$stm->execute($param);
             return $stm->fetch
         }*/

        if(count($param)==0){
            $res=$this->connex->query($rq);
            return $res->fetchall();	
        }else
            {
                $stm=$this->connex->prepare($rq);
                $res=$stm->execute($param);
                return $stm->fetchall();
            }
    }

    public function execute($Rq, $Param){
        
        $stm=$this->connex->prepare($Rq);
        $res=$stm->execute($Param);

        return $res;
            
    }
    
} 

?>       