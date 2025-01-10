<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/boostrap.min.css">
       <link rel="stylesheet" href="../css/csspanier.css">

<style>
  
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
        <li>
          <span><em>01.</em> Récapitulatif</span>
        </li>
        <li style="background-color:#134A7F; color :#fff;"> 
          <span><em>02.</em> Connexion</span>
        </li>
        <li > 
                <span><em>04.</em> Livraison</span>
        </li>
        <li> 
                <span><em>05.</em> Paiement</span>
        </li>
    </ul>
    </div>
        <?php require('../connexion/infopersonnel.php') ?>
</section>

<?php include('../footer.html')?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     
</body>
</html>
