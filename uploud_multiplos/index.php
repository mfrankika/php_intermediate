
<?php
if (isset($_FILES['arquivo'])) {

	//envio de 1 unico arquivo
	//$nome=$_FILES['arquivo']['nome'];//retorna uma string

	//envio de multiplo arquivos
	//$nom=_FILES['arquivo']['nome'];//array com nome dos arqs  

	if (count($_FILES['arquivo']['tmp_name']) > 0 ) {
		
		for ($q=0;$q<count($_FILES['arquivo']['tmp_name']);$q++) {
		
		//gerar um nome para o arquivo
			$nomedoarquivo = md5($_FILES['arquivo']['tmp_name'][$q].time().rand(0,999)).'.jpg';
		
			move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], 'arquivos/'.$nomedoarquivo);
		}
	}
}

?>

<!-- criando o formulario /-->
<form method="POST" enctype="multipart/form-data">
	<!-- name="frmUpLoadMuliple"  action="uploadmultiple.php"//-->

	Arquivo(s):<br><br>
	<input type="file" name="arquivo[]" multiple><br><br>
	
	<input type="submit" value="Enviar Arquivo(s)">

<form/>