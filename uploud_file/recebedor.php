<?php 

//$nome = $_GET['nome'];
//$nome = $_POST['nome'];

//$arquivo = $_FILES['arquivo']; //nome do campo "name" input file

//print_r($arquivo);

 
	$arq = $_FILES['arquivo'];

	//verifica se houve um arquivo que foi enviado
	if(isset($arq['tmp_name']) && !empty($arq['tmp_name'])) {

		//evitar q sejam recebidos arq do mesmo nome = inventar um nome
		 $nomeArquivo = md5(time().rand(0,99)).'.png';

		//receber arq e por pasta arquivos no projeto
		move_uploaded_file($arq['tmp_name'], 'arquivos/'.$nomeArquivo);
		//1ºparam o arq temporario do servidor
		//2º destino salvar o arquivo

		echo "Arquivo enviado com sucesso";
	}

?>