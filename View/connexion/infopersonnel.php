<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Personnel</title>
    <link rel="stylesheet" href="../../css/boostrap.min.css">
       <link rel="stylesheet" href="../../css/csspanier.css">

</head>
<body>

<?php
include(dirname(__DIR__).'../../metier/user.php');
$erreurEmail="";

//if (isset($_POST['submit'])&& !empty($_POST)){
    $email=(isset($_POST['email'])?$_POST['email']:(isset($_GET['email'])? $_GET['email']:null));
    $role=(isset($_POST['role'])?$_POST['role']:(isset($_GET['role'])? $_GET['role']:null));
    $prenom=(isset($_POST['prenom'])?$_POST['prenom']:(isset($_GET['prenom'])? $_GET['prenom']:null));
    $nom=(isset($_POST['nom'])?$_POST['nom']:(isset($_GET['nom'])? $_GET['nom']:null));
    $pwd=(isset($_POST['pwd'])?$_POST['pwd']:(isset($_GET['pwd'])? $_GET['pwd']:null));
    $datenais=(isset($_POST['datenais'])?$_POST['datenais']:(isset($_GET['datenais'])? $_GET['datenais']:null));
    $adresse=(isset($_POST['adresse'])?$_POST['adresse']:(isset($_GET['adresse'])? $_GET['adresse']:null));
    $codepostal=(isset($_POST['codepostal'])?$_POST['codepostal']:(isset($_GET['codepostal'])? $_GET['codepostal']:null));
    $recevoir_offre=(isset($_POST['recevoir_offre'])?$_POST['recevoir_offre']:(isset($_GET['recevoir_offre'])? $_GET['recevoir_offre']:null));
    $pays=(isset($_POST['pays'])?$_POST['pays']:(isset($_GET['pays'])? $_GET['pays']:null));
    $telephone=(isset($_POST['telephone'])?$_POST['telephone']:(isset($_GET['telephone'])? $_GET['telephone']:null));
    
    $href=(isset($_POST['href'])?$_POST['href']:(isset($_GET['href'])? $_GET['href']:null));
    $codepostal=intval($codepostal);
    $recevoir_offre=($recevoir_offre=="recevoir_offre")?1:0;

    $param=array(
        "name_u"=>$nom,
        "prenom_u"=>$prenom,
        "adresse_u"=>$adresse,
        "code_postal"=>$codepostal,
        "pays"=>$pays,
        "telephone"=>$telephone,
        "dateNaiss"=>$datenais,
        "email"=> $email,
        "pwd"=>$pwd,
        "role_u"=>$role,
        "recevoir_offre"=>$recevoir_offre);
    $action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])? $_GET['action']:null));

    if($action=="ajout"){
        $user=new user();
        if ($user->listeParEmail($email)){
            $erreurEmail="email déja exist";
        }else{

            $retour =$user->executer($param);
            if ($retour){ 
                require_once(dirname(__DIR__)."../../panier/panier.php");

              //  include_once(dirname(__DIR__).'../../serveur/cession.php');
                ajoutval('user',$user->listeParEmail($email));             
                if($href){
                    var_dump($user->listeParEmail($email));
                    var_dump($_SESSION['user']);
                ?>
                    <script>
                    
                   
                   
                   window.location.replace("../commande/livraison.php");

                    //echo "ajout avec ";
                   //header('Location:'.'../commande/livraison.php');

                   // header("Location:/php/saminfo/view/commande/livraison.php");
                   //exit();
                   </script>
<?php
               }

            }
        }
    }

    

?>

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

  
    #infopersonnel{
        border:solid 1px gray;
        background-color:#EFEEEE;
        margin:0px 10%;
        padding:5%;
           font-weight:bolder;

    }
    .left{
        margin-left:100px;
        float:left;
        margin-top:10px;
        margin-bottom:5px;
        height:30px; 

    }
    .right{
        float:right;margin-right:50px; 
    }
    .both{
        clear:both;
    }
   
    input[type=text],input[type=tel],input[type=email],input[type=password],input[type=date]{
        margin-top:10px;
        margin-bottom:5px;
        width:50%;
        height:30px;  
        
      

    }
    
    input[type=submit]{
        width:30%;
        background: #007500;
        color: white;
        overflow: hidden;
        font-weight: 400;
        line-height: 36px;
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
  <section>
     <div id="infopersonnel">
    <?php $a=($href)?"/php/saminfo/view/commande/comptepersonnel.php?action=ajout":"/php/saminfo/view/connexion/infopersonnel.php?action=ajout";
?>
    <form action="<?=$a?>" method="post">
        <h1>VOS INFORMATIONS PERSONNELLES</h1>
        <hr>
            <input type="hidden" name="href" value="<?=$href?>">
        <p>
            <input checked type="radio" name="role" value="Particuliere">Particuliere* 
            <input type="radio" name="role" value="Entreprise">Entreprise*
            <input type="radio" name="role" value="Etranger">Etranger*

        </p>
        <p>
			<label class="left" for="idprenom"> Prenom * </label>
            <input type="text" class="right"  id="idprenom" name="prenom" size="20" maxlength="25" required value="<?=!empty($prenom)?$prenom:"";?>">
													<br>
													
		</p>
       
        <p> 
			<label class="left" for="idnom" class="id"> Nom * </label>
            <input class="right" type="text" id="idnom" name="nom" size="20" maxlength="25" required value="<?=!empty($nom)?$nom:"";?>">
			<br>
													
        </p>
        
        <p>
		<label class="left" for="idemail"> Email *</label>
        <input class="right"  type="email" name="email" id="idemail" size="20" maxlength="25"required value="<?=!empty($email)?$email:"";?>"><br>
        <?php if(!empty($erreurEmail)){echo"<span class='help-inline'  style='color:red;'>$erreurEmail</span><br>";}?>
																											
    </p>
    
    <p>
		<label class="left"  for="idpassword"> Mot De Passe *</label>
		<input  class="right" type="password" name="pwd" id="idpassword" size="20" maxlength="25" required><br>
    </p>

    <p>
		<label class="left" for="iddatenais" > Date Naissance *</label>
        <input type="date" class="right" name="datenais" id="iddatenais" size="20" maxlength="10" required value="<?=!empty($datenais)?$datenais:"";?>"> 
		<br>
    </p>
    <p>
		<label class="left" for="idtel" > Teléphone *</label> 
        <input class="right"  pattern="\d*" title="le champ numérique et composé à 8 chiffre" type="tel" name="telephone" id="idtel" size="20" maxlength="8" value="<?=!empty($telephone)?$telephone:"";?>">
        <br>
	</p>

    <p>
        <label class="left" for="idadresse" > Adresse * </label>
        <input class="right" type="text" name="adresse" id="idadresse"  required ><br>
	
	</p>
	
	
	<p>
		<label class="left"  for="idcodepostal" > Code Postal * </label>
	    <input class="right" pattern="\d*" title="le champ numérique et composé à 4 chiffre" type="text" name="codepostal" id="idcodepostal" size="20" maxlength="4"required>
																													</br>																											
	</p>
	
	<p> 
		<label class="left" for="idpays" > pays *</label>
        <input type="text" class="right" name="pays"  id="idpays" size="20" maxlength="25" required>
																						  </br>
    </p>

    <p class="both">
        <input type="checkBox" name="recevoir_offre" value="recevoir_offre">
        Recevez les offres spéciales de nos partenaires
    </p>
    <input type="submit" id="btn" value="s'inscrire">
                                                                                                 			
</form>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     
</body>
</html>
    
</body>
</html>