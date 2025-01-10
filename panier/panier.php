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
//----------------------------------------------------------------------------------------
include(dirname(__DIR__).'../metier/produit.php');
/**
 * Verifie si le panier existe, le crée sinon
 * @return booleen
 */
function creationPanier(){
   if (isset($_SESSION['panier'])==0){
      $_SESSION['panier']=array();
      $_SESSION['panier']['idp'] = array();
      $_SESSION['panier']['nom'] = array();
      $_SESSION['panier']['img'] = array();
      $_SESSION['panier']['pu'] = array();
      $_SESSION['panier']['qte'] = array();
      $_SESSION['panier']['cat'] = array();
      $_SESSION['panier']['caracteristique'] = array();
      $_SESSION['panier']['couleur'] = array();
      $_SESSION['panier']['verrouille'] = false;

   }
   return true;

}

/**
 * Ajoute un article dans le panier
 * @param int $idp
 * @param string $nom
 * @param int $qte
 * @param string $img
 * @param float $pu
 * @param string $cat
 * @param string $caracteristique
 * @param string $couleur
 * @return void
 */
function ajouterArticle($idp,$nom,$img,$qte,$pu,$cat,$caracteristique, $couleur){

    //Si le panier existe
    if (creationPanier())
    {
       //Si le produit existe déjà on ajoute seulement la quantité
       $Produit = array_search($idp,$_SESSION['panier']['idp']);

       if ($Produit !== false)
       {
           //mettre ajour à la quantité
          $_SESSION['panier']['qte'][$Produit] += $qte ;
       }
       else
       {
          //Sinon on ajoute le produit
          
          array_push( $_SESSION['panier']['idp'],$idp);
          array_push( $_SESSION['panier']['nom'],$nom);
          array_push($_SESSION['panier']['img'] , $img);
          array_push( $_SESSION['panier']['qte'],$qte);
          array_push( $_SESSION['panier']['pu'],$pu);
          array_push( $_SESSION['panier']['cat'],$cat);
          array_push( $_SESSION['panier']['caracteristique'],$caracteristique);
          array_push( $_SESSION['panier']['couleur'],$couleur);


       }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }
 
 
 
 /**
  * Modifie la quantité d'un article
  * @param $idp
  * @param $action
  * @return void
  */
 function modifierQTeArticle($idp,$action){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Recharche du produit dans le panier
       //Si la quantité est positive on modifie sinon on supprime l'article
         $Produit = array_search($idp,$_SESSION['panier']['idp']);
          if ($Produit !== false)
          {
             if ($action=="ajout"){
               $_SESSION['panier']['qte'][$Produit] ++;
             }

             if($action=="enlever"){
               $_SESSION['panier']['qte'][$Produit] =$_SESSION['panier']['qte'][$Produit]-1;
             }
          }

          if ($_SESSION['panier']['qte'][$Produit]==0){
            supprimerArticle($idp);
            }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }
 

 /**
 * Supprime un article du panier
 * @param $idp
 * @return unknown_type
 */
function supprimerArticle($idp){
   //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
       //Nous allons passer par un panier temporaire
       $tmp=array();
       $tmp['idp'] = array();
       $tmp['nom'] = array();
       $tmp['img'] = array();
       $tmp['qte'] = array();
       $tmp['pu'] = array();
       $tmp['cat'] = array();
       $tmp['caracteristique'] = array();
       $tmp['couleur'] = array();
       $tmp['verrouille'] = $_SESSION['panier']['verrouille'];

       for($i = 0; $i < count($_SESSION['panier']['idp']); $i++)
       {
         $Produit = array_search($idp,$_SESSION['panier']['idp']);
          if ($_SESSION['panier']['idp'][$i] !== $idp)
          {
             array_push( $tmp['idp'],$_SESSION['panier']['idp'][$i]);
             array_push( $tmp['nom'],$_SESSION['panier']['nom'][$i]);
             array_push( $tmp['img'],$_SESSION['panier']['img'][$i]);
             array_push( $tmp['pu'],$_SESSION['panier']['pu'][$i]);
             array_push( $tmp['qte'],$_SESSION['panier']['qte'][$i]);
             array_push( $tmp['cat'],$_SESSION['panier']['cat'][$i]);
             array_push( $tmp['caracteristique'],$_SESSION['panier']['caracteristique'][$i]);
             array_push( $tmp['couleur'],$_SESSION['panier']['couleur'][$i]);

          }
 
       }
       //On remplace le panier en session par notre panier temporaire à jour
       $_SESSION['panier'] =  $tmp;
       //On efface notre panier temporaire
       unset($tmp);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }
 
 
 /**
  * Montant total du panier
  * @return double
  */
 function montantPanier(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['idp']); $i++)
    {
     if (disponible($_SESSION['panier']['idp'][$i]))
       $total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['pu'][$i];
    }
    return $total;
 }
 
 
 /**
  * Fonction de suppression du panier
  * @return void
  */
 function supprimePanier(){
    unset($_SESSION['panier']);
 }
 
 /**
  * Permet de savoir si le panier est verrouillé
  * @return booleen
  */
 function isVerrouille(){
    return (isset($_SESSION['panier']) && $_SESSION['panier']['verrouille'])?true:false;
    
 }
 
 /**
  * Compte le nombre d'articles différents dans le panier
  * @return int
  */
 function compterArticles()
 {
    return (isset($_SESSION['panier']))?count($_SESSION['panier']['idp']):0;
 }
 function disponible($idp){
   $produit=new produit();
   $list=$produit->listParId($idp);
   foreach ($list as $p)
   {
    $Produit = array_search($idp,$_SESSION['panier']['idp']);
    if($p['qte']>=$_SESSION['panier']['qte'][$Produit]){
      return true;
    }
   }
   return false;
 }
?>