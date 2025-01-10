
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paiement</title>
    <link rel="stylesheet" href="../../css/boostrap.min.css">
       <link rel="stylesheet" href="../../css/csspanier.css">
    <style>
        #payement{
            border:solid 1px gray;
            background-color:#EFEEEE;
            padding:3%;
        }
        
    </style>
</head>
<body>
<?php include_once('../header.php')?>


<?php
include_once(dirname(__DIR__).'../../panier/panier.php');
include_once(dirname(__DIR__).'../../metier/commande.php');


   $livraison = (isset($_POST['livraison'])? $_POST['livraison']:  (isset($_GET['livraison'])? $_GET['livraison']:null )) ;

   $commande=(isset($_POST['commande'])? $_POST['commande']:(isset($_GET['commande'])? $_GET['livraison']:null )) ;

   $enregistrer=null;
   if ($commande==true){  

    if (creationPanier() && creeSession())
    {  
      $date=date("Y-m-d H:i:s");
      if ($_SESSION["user"]!=null){
          $nbArticles=count($_SESSION['panier']['idp']);
          for ($i=0 ;$i < $nbArticles ; $i++)
          {       

            
             $param=array(
              'jour'=>$date,
              'idcl'=>$_SESSION["user"][0]["id_u"],
              'id_p'=>$_SESSION["panier"]["idp"][$i],
              'qte_c'=>$_SESSION["panier"]["qte"][$i],
              'livraison'=>$livraison
            );
            $commande=new commande();
            $retour=$commande->executer($param);
           
          }
          $enregistrer="enregistrer";
              echo "<span style='background-color:#FF9800; color:#fff;padding:2px;'>Votre commande sur SAMINFO a bien été enregistrée</span>";
              supprimePanier();
      }
    }
  }

?>
  <section>
      <h1>Récapitulatif de la commande</h1>
      <hr>
      <br><br>
    <div id="step">
    <ul>
        <li >
          <span><em>01.</em> Récapitulatif</span>
        </li>
        <li> 
          <span><em>02.</em> Connexion</span>
        </li>
        <li> 
                <span><em>04.</em> Livraison</span>
        </li>
        <li style="background-color:#134A7F; color :#fff;"> 
                <span><em>05.</em> Paiement</span>
        </li>
    </ul>
    </div>
    <div id="payement">
    <span>VEUILEZ NOUS ENVOYER UN CHÈQUE AVEC :</span><hr>
    <br><br>
    <ul type="square" id="pay" align="left">

        <li>Motant du règlement. <span style="color:blue;"><?php if (creationPanier()){ echo montantPanier();}?> TND </span></li>
        <li>payable à l'ordre de samInfo</li>
        <li>à envoyer à tunis Bizerte</li>
        <li>Votre commande vous sera envée dès réception du paiement</li>
        <li>Pour toute question ou informaion complémentaire merci de contacter notre <a href="/php/samInfo/view/contact.php" style="color:black;">support client</a>.</li>
    </ul>
</div>
    <div>
    <?php if ($enregistrer!="enregistrer"){ ?>
      <div align="right">  
          <a href="payement.php?commande=true&livraison=<?=$livraison?>">       
            <input type="submit" id="btn" value="Je confirme ma commande ">
          </a>
        </div>
       

      <div align="left">
        <a href="">        
          <input type="button" id="btn" value="Annuler commande">
        </a>
      </div>
      <?php }?>
    </div>     

                
</section>

<?php require('../footer.html')?>
<!--Boostrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>