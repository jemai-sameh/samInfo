<?php 
session_start();

function creeSession(){
        if (isset($_SESSION['user'])==0){
            $_SESSION['user']=null;
        }
        return true;
    }


    function ajoutval($champ,$val){
        if (creeSession())
            $_SESSION[$champ]=$val;

        return true;
    }

     

 function supprimerSession(){
    unset($_SESSION['user']);
 }
    
?>