   <?php
require_once("../panier/panier.php");
$erreur = false;
$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression','ajoutQte','enleverQte')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $idp = (isset($_POST['idp'])? $_POST['idp']:  (isset($_GET['idp'])? $_GET['idp']:null )) ;
   $nom = (isset($_POST['nom'])? $_POST['nom']:  (isset($_GET['nom'])? $_GET['nom']:null )) ;
   $img = (isset($_POST['img'])? $_POST['img']:  (isset($_GET['img'])? $_GET['img']:null )) ;
   $qte = (isset($_POST['qte'])? $_POST['qte']:  (isset($_GET['qte'])? $_GET['qte']:null )) ;
   $pu = (isset($_POST['pu'])? $_POST['pu']:  (isset($_GET['pu'])? $_GET['pu']:null )) ;
   $cat = (isset($_POST['cat'])? $_POST['cat']:  (isset($_GET['cat'])? $_GET['cat']:null )) ;
   $caracteristique = (isset($_POST['caracteristique'])? $_POST['caracteristique']:  (isset($_GET['caracteristique'])? $_GET['caracteristique']:null )) ;
   $couleur = (isset($_POST['couleur'])? $_POST['couleur']:  (isset($_GET['couleur'])? $_GET['couleur']:null )) ;

   
   //Suppression des espaces verticaux
  // $nom = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $pu = floatval($pu);
   $idp = intval($idp);


   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($qte)){
      $QteArticle = array();
      $i=0;
      foreach ($qte as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
  }else
   $QteArticle = intval($qte);
}


if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($idp,$nom,$img,$qte,$pu,$cat,$caracteristique, $couleur);
         break;

      Case "suppression":
         supprimerArticle($idp);
         break;
      case "ajoutQte":
          modifierQTeArticle($idp,"ajout");
      break;
      case "enleverQte":
        modifierQTeArticle($idp,"enlever");

      break;
      Default:
         break;
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../css/boostrap.min.css">
       <link rel="stylesheet" href="../css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/csspanier.css">
<style>


</style>
</head>
<body>
<?php include('../view/header.php')?>
  <section>
      <h1>Récapitulatif de la commande</h1>
      <hr>
      <br><br>
    <div id="step">
    <ul>
        <li  style="background-color:#134A7F; color :#fff;">
          <span><em>01.</em> Récapitulatif</span>
        </li>
        <li> 
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
    <div id="tab">
      <div class="table-responsive" id="pan">
        <table class="table">
            <thead style="background-color:#515151;color:#fff;">
                <tr>
                <th scope="col" width="200px">Produit</th>
                    <th scope="col" width="400px">Description</th>
                    <th scope="col" width="100px">Disponibilité</th>
                    <th scope="col" width="150px">Prix Unitaire</th>
                    <th scope="col" width="100px">quantité</th>
                    <th scope="col" width="100px">catégorie</th>
                    <th scope="col" width="250px">total</th>
                </tr>
            </thead>
            <tbody>
          <?php
            //supprimePanier();         

            if (creationPanier())
             {       
                 $nbArticles=count($_SESSION['panier']['idp']);
                  if ($nbArticles <= 0)
                    echo "<tr><td>Votre panier est vide </ td></tr>";
                   else
                    {
                      for ($i=0 ;$i < $nbArticles ; $i++)
                       {
          ?>             
              <tr>
                  <td width="100px">
                    <img width="99px" height="99px" src="/php/saminfo/image/upload/<?=$_SESSION['panier']['img'][$i]?>">
                   </td>

                <td>
                  <b><?php echo htmlspecialchars($_SESSION['panier']['nom'][$i])?></b><br>
                  <span>
                    <?php echo htmlspecialchars($_SESSION['panier']['caracteristique'][$i])?>
                    <?php echo htmlspecialchars($_SESSION['panier']['couleur'][$i])?>
                  </span>

                </td>

                <td>
                    <?php echo ((disponible($_SESSION['panier']['idp'][$i]))?"<span style=\"color:green;\">disponible</span>":"<span style=\"color:red;\">n'est pas disponible</span>");

                    ?>
                </td>

                <td>
                  <?php echo htmlspecialchars($_SESSION['panier']['pu'][$i])?> TND
                </td>

                <td>
                  <a href='pagePanier.php?action=ajoutQte&idp=<?php echo htmlspecialchars($_SESSION['panier']['idp'][$i])?>'>
                      <svg height="15px" viewBox="0 0 512 512" width="15px" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm112 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/></svg>
                  </a> 
                      <?php echo $_SESSION['panier']['qte'][$i] ?>
                  <a href='pagePanier.php?action=enleverQte&idp=<?php echo htmlspecialchars($_SESSION['panier']['idp'][$i])?>'>
                    <svg height="15px" viewBox="0 0 512 512" width="15px" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm112 277.332031h-224c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h224c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/></svg>
                  </a>
                </td>



                <td>
                  <?php echo htmlspecialchars($_SESSION['panier']['cat'][$i])?>
                </td>
                  
                <td width="50px">
                    <?php echo $_SESSION['panier']['qte'][$i]*$_SESSION['panier']['pu'][$i] ?> TND
                      <a href="pagePanier.php?action=suppression&idp=<?php echo htmlspecialchars($_SESSION['panier']['idp'][$i])?>">
                     

                      <svg id="Layer_1" enable-background="new 0 0 512 512" height="10pt" viewBox="0 0 512 512" width="10pt" xmlns="http://www.w3.org/2000/svg"><g><path d="m424 64h-88v-16c0-26.51-21.49-48-48-48h-64c-26.51 0-48 21.49-48 48v16h-88c-22.091 0-40 17.909-40 40v32c0 8.837 7.163 16 16 16h384c8.837 0 16-7.163 16-16v-32c0-22.091-17.909-40-40-40zm-216-16c0-8.82 7.18-16 16-16h64c8.82 0 16 7.18 16 16v16h-96z"/><path d="m78.364 184c-2.855 0-5.13 2.386-4.994 5.238l13.2 277.042c1.22 25.64 22.28 45.72 47.94 45.72h242.98c25.66 0 46.72-20.08 47.94-45.72l13.2-277.042c.136-2.852-2.139-5.238-4.994-5.238zm241.636 40c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16zm-80 0c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16zm-80 0c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16z"/></g></svg>                        </a>
                </td>
              </tr>
              
              <?php
                 }}
   
              ?>

          </tbody>
          <tfooter>

            <tr>
              <td colspan="5" align="right" > Montant Total :</td>
              <td colspan="2"><h1 style="text-align:center;"><?php echo montantPanier()?></h1></td>
            </tr>
          
          </tfooter>
        </table>
      </div>

   </div>


        <div align="right">  
        <a href="/php/saminfo/view/commande/comptecommande.php?panier=true">        
          <input type="button" id="btn" value="Commander">
        </a>
        <div>
          

        <?php } ?>
                
</section>

<?php require('../view/footer.html');?>

<script >
    function acceder(){
       var panier=document.getElementById('tab');
        if (visible(panier)==false){

        }
    }
    function visible(monElement){
      var visibilite = JQuery(monElement).is(:visible); 
      return visibilite;
    }
</script>
<!--Boostrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>