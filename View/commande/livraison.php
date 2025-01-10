<?php
//include(dirname(__DIR__).'../../serveur/cession.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livraison</title>
    <link rel="stylesheet" href="../../css/boostrap.min.css">
       <link rel="stylesheet" href="../../css/csspanier.css">
    <style>
        #livraison{
            border:solid 1px gray;
            background-color:#EFEEEE;
            padding:3%;
        }
        p{
            border:solid 1px gray;
            padding:3%;
            display:flex;
            background-color:#fff;
        }
        .type{
            padding:4px;
        }
        .montant{
            color:red;
            padding-left:5%;
            font-weight:bolder;
        }
        #step{
         width:100%;
         }
    #step ul li{
         width:50%;
        font-size:20pt;
        padding:1% 2%;


        display:inline;
        border :0.5px solid #CACACA;
        margin:5px;
        background-color:#EFEEEE;

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
        <li > 
          <span><em>02.</em> Connexion</span>
        </li>
        <li style="background-color:#134A7F; color :#fff;"> 
                <span><em>04.</em> Livraison</span>
        </li>
        <li > 
                <span><em>05.</em> Paiement</span>
        </li>
    </ul>
    </div>
    <div id="tab">
    <div id="livraison">
        <form action="payement.php" method="post">
        choisissez une option de livraison pour l'adresse:    
        <?php 
            if(creeSession()){
                if ($_SESSION["user"]!=null){
                    echo $_SESSION["user"][0]['adresse_u'];
                }
            }
        ?>
        <p>
        <input type="radio" name="livraison" value="magasin" checked>
            <span class="type">
                <b>Retrait en Magasin:</b>
                Retirer votre commande le jour même dans notre boutique Tunis-ben Arous ,le meilleur prix
            </span>
            <span class="montant">GRATUIT</span> 
        </p>
        <p>
            <input type="radio" name="livraison" value="Poste Tunisienne"> 
            <span class="type">
                <b>Poste Tunisienne :</b>
                Livraison gratuite à partir de 300DT d'achat(Délai de livraison : 2-3jours ouvrables)
            </span>
            <span class="montant">7,000 TND</span>
        </p>
            <p>
            <input type="radio" name="livraison" value="Domicile">
            <span class="type">
                <b>À Domicile:</b>            
                prix et délai de livraison selon distance   
            </span>

            <span class="montant">1 TND<span>
        </p>
    </div>
            <div align="right">  
                <input type="submit" id="btn" value="Commander">
            <div>
    </form>
          

                
</section>

<?php require('../footer.html')?>
<!--Boostrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>