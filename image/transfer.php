<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Transfert de fichier</title>
</head>

<body>
	
	<form action="transfer.php" method="post" enctype="multipart/form-data">
	<fieldset>
		
		<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
		<legend><b>Transfert de fichier</b></legend>

		<table>
		
		<tbody>
			<tr>
				<th>Fichier</th>
				<td> <input type="file" name="fich" accept="image" size="50"/></td>
			</tr>
			<tr>
				<th>Clic!</th>
				<td> <input type="submit" value="Envoi" /></td>
			</tr>
		</tbody>

		</table>
	
	</fieldset>
	</form>

	<!––Code PHP ––>
	
	<?php
	if(isset($_FILES['fich']) && $_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$targetDir = "upload/";
		$fileName = basename($_FILES["fich"]["name"]);
		$targetFilePath = $targetDir.$fileName;
		var_dump($_FILES["fich"]);
		$result=move_uploaded_file($_FILES["fich"]["tmp_name"],$targetFilePath);
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$allowTypes = array('jpg','png','jpeg','gif','pdf');
		if(in_array($fileType, $allowTypes)){
			if($result){
				echo "test";
				$bd=new PDO('mysql:host=localhost;dbname=saminfo','root','');
				$param=array('im'=>$fileName,'id'=>$_POST['id']);
				$rq='insert into produit (img) values(:im) where idp:id';
				$stm=$bd->prepare($rq);
				$res=$stm->execute($param);
			}
			else{
				$statusMsg = "Sorry, there was an error uploading your file.";
			}
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
	
        // $image=addslashes(file_get_contents($result));
		
		
	
			if($res){
				echo "Fichier uploadé avec succès.";
			}else{
				echo "Échec d'upload du fichier.";
			} 
	}
	?>
</body>
</html>