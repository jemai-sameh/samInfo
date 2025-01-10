<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="4"  cellspacing="4" cellpadding="4">
        <thead  bgcolor="dark">
        <tr>
            <th >Numero Produit</th>
            <th>Nom</th>  
            <th>prix unitaire</th> 
            <th>Catégorie</th>
            <th>caractéristique</th>
            <th>couleur</th>
            <th>Ajout AUX panier</th>

        </tr>
        </thead>
        <tbody>
        <?php
                    //include_once 'metier/DataBase';
                    $bd=new PDO('mysql:host=localhost;dbname=saminfo','root','');
                    $rq="SELECT `idp`, `nom`, `pu`, `qte`, `cat`, `caracteristique`, `couleur` FROM `produit` ";
                    $resultat=$bd->query($rq);
                    $retour=$resultat->fetchAll();
                    foreach($retour as $p)
                    {
            ?>
        <tr>
            <th ><input type="text" name="idp" value="<?= $p['idp'] ?>"></th>
            <td><input type="text" name="nom" value="<?= $p['nom'] ?>"></td>
            <td><input type="text" name="pu" value="<?= $p['pu'] ?>"></td>
            <td><input type="text" name="cat" value="<?= $p['cat'] ?>"></td>
            <td><input type="text" name="caracteristique" value="<?= $p['caracteristique'] ?>"></td>
            <td><input type="text" name="couleur" value="<?= $p['couleur'] ?>"></td>
            <td> <input type="file" name="fich" accept="image" size="50"/></td>
           <!-- <td><a href="htmlspecialchars("pagePanier.php?action=ajout&l=".rawurlencode($_SESSION['panier']['idp'][$i]))">ajout</td>
                    --><td> <a href="pagePanier.php?action=ajout&idp=<?=$p['idp'];?>&img=<?=$p['img']?>&nom=<?= $p['nom'] ?>&qte=1&pu=<?= $p['pu']?>&cat=<?= $p['cat']?>&caracteristique=<?= $p['caracteristique'] ?> &couleur=<?= $p['couleur'] ?>"> Ajout</a></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
</table>

</body>
</html>