<?php
require_once(dirname(__DIR__)."../../panier/panier.php");

        if(creeSession()){
            if ($_SESSION["user"]!=null){
                header('Location:'.'../commande/livraison.php');
            exit();
        }  }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compte</title>
    <link rel="stylesheet" href="../../css/boostrap.min.css">
       <link rel="stylesheet" href="../../css/csspanier.css">
    <style>
    #compte{
        display:inline-flex;
        width:90%;
            }
    
    #dejacompte,#cree{
        border:solid 1px gray;
        background-color:#EFEEEE;
        width:100%;
        padding:5%;
        margin-left:5%;
        margin-right:5%;

    }
    input{
        margin-top:10px;
        margin-bottom:5px;
        width:100%;
        height:30px;
        
    }
   
    input[type=submit]{
        
    background: #007500;
    color: white;
    overflow: hidden;
    font-weight: 400;
    line-height: 36px;
    margin-top:10px;
    margin-right: 2.5em;
    cursor: pointer;
    padding: 0 45px;
    position: relative;
    text-align: center;
    border: 0 solid transparent;
    
    }
    </style>
</head>
<body>
    <?php include('../header.php')?>
  <section>
      <h1>Récapitulatif de la commande</h1>
      <hr>
      <br><br>
    <div id="step">
    <ul>
        <li >
          <span><em>01.</em> Récapitulatif</span>
        </li>
        <li style="background-color:#134A7F; color :#fff;" > 
          <span><em>02.</em> Connexion</span>
        </li>
        <li > 
                <span><em>04.</em> Livraison</span>
        </li>
        <li > 
                <span><em>05.</em> Paiement</span>
        </li>
    </ul>
    </div>
       <?php include ('../connexion/compte.php') ?>
    </section>
    <?php require('../footer.html')?>

</body>
</html>