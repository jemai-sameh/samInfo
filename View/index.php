<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>


#panier svg {
  width: 20px;
  height: 20px;
  vertical-align: middle;
  fill: currentColor;
  display:inline-block;  
}

#panier {
   border:none;
}



  section{
    margin:30px;
  }
  #card{
    display: grid;
  grid-template-columns: repeat(3,1fr );
  align-items: center;
    text-align: center;
  }







#panier{
  width:80%;
  color: #666;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 28px;
    display: inline-block;
    padding: 0 15px 0 30px;
    font-size: 12px;
    vertical-align: top;
    height: 30px;
    transition: 0.2s all ease 0s;
    position: relative;
}
header{
        position: static;
      }



/*.cartlink:hover{
  text-decoration:none;
}
.cartlink:hover a{
  background-color:#F4A137 !important;
  color:#fff !important;
  font-size: 14px !important;

}
*/
.cartlink:hover{
  text-decoration:none;
}
.cartlink:hover button{
  background-color:#F4A137 !important;
  color:#fff !important;
  font-size: 14px !important;

}
  #serv{
    width:400px;
    height:500px ;
    margin:10px;
  }
</style>
</head>
<body>
  <header>
<?php require_once __DIR__ .'/header.php';?>
</header>

<section>


<?php include_once ('../metier/DataBase.php');

  $bd=new DataBase();
  $cat = isset($_GET['cat'])?$_GET['cat']:null;
  $retour=null;
if ($cat==null){
    $rq="select idp, nom,pu,qte,img,cat,caracteristique, couleur from produit ";
  $retour=$bd->query($rq);
}else{
  $rq="select idp, nom,pu,qte,img,caracteristique, couleur from produit where cat=? ";
  $retour=$bd->query($rq,array($cat));
}
?>
    <div id="card" >

<?php

  foreach($retour as $p)
  {
   ?> 
          <a class="cartlink" href="/php/samInfo/View/index2.php?idp=<?=$p['idp']?>">

        <div id="serv">
          <div class="card h-100">
            <img width="350px" height="300px" src="/php/saminfo/image/upload/<?=$p['img']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" ><i><?php echo $p['nom']?> </i></h5>
              <p class="card-text" style="color:red;"><b><?php echo $p['pu'] ?> TND</b></p> 


  <button type="button" id="panier" onclick="<?php
      //require_once(dirname(__DIR__)."../panier/panier.php");
     // $pu = floatval($p['pu']);
      //$idp = intval($p['idp']);   
      //ajouterArticle($idp,$p['nom'],$p['img'],1,$pu,$p['cat'],$p['caracteristique'],$p['couleur']);
  ?>">
<svg height="512pt" viewBox="0 -31 512.00026 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"></path><path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path><path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path></svg>
<span>Ajouter au panier</span>
    </button>
            </div>
          </div>
        </div>
        </a>

  <?php }?>
   </div>
   </section>

      <?php require_once __DIR__ .'/footer.html';?>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      

</body>
</html>