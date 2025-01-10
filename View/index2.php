<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Document</title>
    <style>
        section{
            margin: 50px;
            padding: 5px;
        }
        .image{
            float: left;
        }
        .content{
            margin-right:100px;
            width:600px;
            float: right;


        }


 #quantity_wanted_p {
    width: 145px !important;
    height: 47px !important;
    background: #4a5678 !important;
    padding: 8px 15px !important;
    }
#quantity_wanted_p {
    margin: 0;
    display: inline-block;
    float: left;
    width: 120px;
    height: 40px;
    background: #eee;
    padding: 5px 15px;
}
#quantity_wanted_p {
    margin: 0;
    display: inline-block;
    float: left;
    width: 120px;
    height: 40px;
    background: #eee;
    padding: 5px 15px;
}

    </style>
</head>
<body>
<?php require_once __DIR__ .'/header.php';
require_once(dirname(__DIR__)."../panier/panier.php");
?>

    <?php include_once ('../metier/DataBase.php');?>
    <section>
        <?php
               $idp = (isset($_POST['idp'])? $_POST['idp']:  (isset($_GET['idp'])? $_GET['idp']:null )) ;
               $bd=new DataBase();
               $param=array(
                   'id'=>$idp
               );
               $rq="select idp, nom,pu,qte,img,cat,caracteristique, couleur from produit where idp=:id ";
               $retour=$bd->query($rq,$param);
               foreach($retour as $p)
        {
        ?>
        <div class="image">
        <img width="400px" height="500px" src="/php/saminfo/image/upload/<?=$p['img']; ?>"  alt="<?php echo $p['nom']?>">
        </div>
        <div class="content">
                <h1 style="color:#4A5678;"><i><?php echo $p['nom']?> </i></h1>
                <br><br>
                <p style="font-size: small;"><b>Caractéristique :</b><br><?php echo $p['caracteristique']?> </p>
                <p><b>Catégorie  :  </b><?php echo $p['cat']?> </p>
               
                    <p><b>Quantité  :  </b><?php echo($p['qte']>0)?$p['qte']:"<span style=\"color:red;\">Ce produit n\'est plus en stock</span>" ?></p>
                    <p><b>Couleur  :  </b><?php echo($p['couleur'])?></p>
                
                <p  style="color:red;"><b><?php echo $p['pu'] ?> DT</b></p>
                <p>
               
                <div id="quantite">
                <label>Quantité</label>
                        <input type="text" width="20px" pattern="\d*" title="le champ numérique" value="1">
                </div>
                <div>
                    <a href="/php/saminfo/panier/pagePanier.php?action=ajout&idp=<?=$p['idp'];?>&img=<?=$p['img']?>&nom=<?= $p['nom'] ?>&qte=1&pu=<?= $p['pu']?>&cat=<?= $p['cat']?>&caracteristique=<?= $p['caracteristique'] ?> &couleur=<?= $p['couleur'] ?>"> 
                    <input type="button" width="30px" value="commander" style="background-color:red;">
                    </a>
                </div>
                </form>
                </p>
                <table class="table">   
                    <thead class="thead-light">          
                        <tr>
                            <th>3 mois</th>
                            <th>6 mois</th>
                        </tr>
                    </thread>
                    <tbody>
                        <tr>
                            <td><?=doubleval($p['pu'])/3?></td>
                            <td><?=doubleval($p['pu'])/6?></td>
                        </tr>
                    </tbody>
                </table>

        </div>
    <?php
        }
    ?>
    </section>
    <?php require_once __DIR__ .'/footer.html';?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      

</body>
</html>