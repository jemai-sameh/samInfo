<table>
<?php
$bd=new PDO('mysql:host=localhost;dbname=saminfo','root','');
$rq='select id,img_path from image ;';
$req = $bd->prepare($rq);

//$req->execute($param);
//$t=
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute();

//while($data=$req->fetch()){
while ($row = $req->fetch()) {
?>

<tr>
    <td>
        <?php echo $row['id']; ?>
    </td>

    <td>
    <?php echo $row['img_path']; ?>
 </td>
    

        <img src="upload/<?=$row['img_path']; ?>" width="100" height="100">
    </td>


</tr>

<?php
}?>
</table>

<!--echo '<ul>';


       echo '<li>' . $inscrit['img'] .'</li>';



echo '</ul>';
-->

