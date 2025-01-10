<?php
include(dirname(__DIR__).'../../metier/user.php');

    $dejacompte=(isset($_POST['dejacompte']))?$_POST['dejacompte']:null;
    $href=(isset($_POST['href'])?$_POST['href']:(isset($_GET['href'])? $_GET['href']:null));
    $email=(isset($_POST['email'])?$_POST['email']:(isset($_GET['email'])? $_GET['email']:null));
    echo $email;
    echo $email;

    if ($dejacompte=="dejacompte"){
        $user=new user();
        echo $email;
        $u=$user->listeParEmail($email);  
              var_dump($u);

        foreach ($u as $us){
        echo $us;
        if ($us){
                include(dirname(__DIR__).'../../serveur/cession.php');
                ajoutval('user',$us->name_u);
                if($href){
                    header("Location:/php/saminfo/view/commande/livraison.php");
                    exit();

                }

        }else{
            echo "ghjklm";
        }}
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compte</title>
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
    height:50px;
    }
    </style>
</head>
<body>
    <section>
        <h1>IDENTIFIER-VOUS</h1>
        <hr>
        <br><br>
        <div id="compte">
            <div id="cree">
            <?php
                    $action=(isset($_GET['panier'])==true)?"/php/saminfo/view/commande/comptepersonnel.php":"/php/saminfo/view/connexion/infopersonnel.php";
                
            ?>
                <form action="<?=$action?>" method="post">
                    <h3>crée votre compte</h3>
                    <hr>
                    Saisisser votre adresse e-mail pour créer votre compte.
                    <br>
                    <label for="mail">Adresse e-mail</label>
                    <br><input type="mail" name="mail" id="mail" required>
                    <br>
                    <input type="hidden" name="href" value="<?=isset($_GET['panier'])?>"/>
                    <input type="submit" id="btn" value="Crée votre compte">
                </form>
            </div>

            <div id="dejacompte">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h3>déja inscrit?</h3>
                    <hr>                   
                    <label for="mail">Adresse e-mail</label>
                    <br><input type="mail" name="mail" id="mail" required>
                    <br>
                    <label for="mail">Mot de passe</label>
                    <br><input type="password" name="mail" id="mail" required>
                    <br>
                    <input type="hidden" name="dejacompte" value="dejacompte">
                    <input type="hidden" name="href" value="<?=isset($_GET['panier'])?>">
                    <input type="submit" id="btn" value="Connexion">
                </form>
            </div>
        <div>
    </section>
</body>
</html>