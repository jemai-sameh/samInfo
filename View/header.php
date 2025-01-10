<?php
require_once(dirname(__DIR__)."../panier/panier.php");

//include_once(dirname(__DIR__).'../serveur/cession.php');

  $dec=(isset($_GET['deconnection'])?$_GET['deconnection']:null);
      if($dec==true){
        supprimerSession();
      }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
    
    nav{
        clear: both;
        margin-top: 100px;
      }
      header{
        position: static;
        margin-top: 5px;
      }
        #logo{
          float: left;
        }
        #titre{
          padding-left:40%;
          float: left;
        }
        #panierAccount{
          float: right;
          margin-right: 20%;
          margin-top:20px;
          display: flex;
          
        }
        a:hover{
          text-decoration: none;
          color: black;
        }
      </style>
</head>
<body>
    <header>
      
      <img id="logo" style="border-radius:10%;     width: 90px;
    height: 40px;
    margin-left: 30px;" src="/php/samInfo/image/téléchargé.jfif" alt="SAMINFO">
      <div id="titre">
         <h1><b>SAMINFO</b></h1>
          <i>vente des Accessoires Informatique</i>
      </div>
      <div id="panierAccount">
        <a href="/php/samInfo/panier/pagePanier.php">
          <svg viewBox="0 -46 512 512" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m512 121.863281-380.523438-50.601562-12.957031-71.261719h-118.519531v30h93.480469l60 329.800781h30.097656c-1.664063 4.695313-2.578125 9.941407-2.578125 15.199219 0 24.8125 20.1875 45 45 45s45-20.1875 45-45c0-5.257812-.914062-10.503906-2.578125-15.199219h96.160156c-1.667969 4.695313-2.582031 9.941407-2.582031 15.199219 0 24.8125 20.1875 45 45 45s45-20.1875 45-45c0-5.257812-.914062-10.304688-2.578125-15h32.578125v-30h-303.480469l-5.457031-30h338.9375zm-271 253.136719c0 8.269531-6.730469 15-15 15s-15-6.730469-15-15 6.730469-15 15-15 15 6.730469 15 15zm181 0c0 8.269531-6.730469 15-15 15s-15-6.730469-15-15 6.730469-15 15-15 15 6.730469 15 15zm60-195h-60v-39.839844l60 7.976563zm-181 30v60h-60v-60zm-60-30v-63.910156l60 7.976562v55.933594zm90 30h61v60h-61zm0-30v-51.941406l61 8.109375v43.832031zm-120-67.898438v67.898438h-59.753906l-14.132813-77.726562zm-54.300781 97.898438h54.300781v60h-43.390625zm265.300781 60v-60h60v60zm0 0"/></svg>
        Panier 
        </a>
        <a href="/php/samInfo/view/compte.php">
            <svg height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 512 512" width="512" height="512"><path d="M68.169,447.023C71.835,449.023,159.075,496,256,496c105.008,0,184.772-47.134,188.116-49.14A8,8,0,0,0,448,440c0-64.593-19.807-123.7-55.771-166.442-25.158-29.9-56.724-50.28-91.539-59.662a104,104,0,1,0-89.38,0c-34.815,9.382-66.381,29.765-91.539,59.662C83.807,316.3,64,375.407,64,440A8,8,0,0,0,68.169,447.023ZM168,120a88,88,0,1,1,88,88A88.1,88.1,0,0,1,168,120ZM132.013,283.859C164.5,245.258,208.528,224,256,224s91.5,21.258,123.987,59.859c32.681,38.838,51.056,92.48,51.977,151.474C414.845,444.6,343.708,480,256,480c-81.11,0-157.5-35.609-175.96-44.856C81,376.223,99.367,322.656,132.013,283.859Z"/></svg>

        </a>
          <?php             

            if(creeSession()){             
              if ($_SESSION["user"]!=null){
              ?>
                <span><i><?=$_SESSION['user'][0]['name_u']?></i></span>
                <a href="<?=$_SERVER['PHP_SELF'];?>?deconnection=true">
                  <span>DECONNECTION</span>
                </a>
         <?php }}        
          ?>
      </div>
      <div id="account">
        
      </div>
    <nav class="navbar navbar-expand-lg  navbar-dark"  style="background-color: #134A7F;" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="/php/samInfo/view/index.php">Accueil</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ordinateur
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=ordinateur Portable">Ordinateur Portable</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=ordinateur Bureau">Ordinateur de Bureau</a>
              </div>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                SMART
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=telephonie">téléphonie </a>
                      <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=tablette">tablette</a>
              </div>
            </li>
            
            <li class="nav-item dropdown ">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ESPACE GAMER
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat='ordinateur Gamer'">Ordinateur Gamer</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat='accessoires Gamer'">Accessoires Gamer</a>
              </div>
            </li>
       
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stockage
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=Disque Dur Externe">Disque Dur Externe</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=Disque Dur Interne">Disque Dur Interne</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=Disque Dur SSD">Disque Dur SSD</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=Flash Disque">Flash Disque</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=Carte Mémoire">Carte Mémoire</a>
                <a class="dropdown-item" href="/php/samInfo/view/index.php?cat=CD/DVD">CD/DVD</a>

              </div>

                      
            <li class="nav-item">
              <a class="nav-link " href="/php/samInfo/view/contact.php" > Contacter nous</a>
            </li>
          </ul>

         <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
        </div>
      </nav>
      </header>

</body>
</html>