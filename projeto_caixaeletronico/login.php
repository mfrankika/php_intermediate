<?php
session_start();
require 'config.php';

// se foi enviado alguma coisa
if(isset($_POST['agencia']) && empty($_POST['agencia']) == false) {
	$agencia = addslashes($_POST['agencia']);
	$conta = addslashes($_POST['conta']);
	$senha = addslashes($_POST['senha']);

	// consulta ao bco dados recebido x no bco
	$sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
	$sql->bindValue(":agencia", $agencia);
	$sql->bindValue(":conta", $conta);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();

	// se encontro o registro
	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();

		//recebe o id da conta da sessao, faz o login para conta 
		$_SESSION['banco'] = $sql['id'];
		header("Location: index.php");
		exit;
	}

}
?>
<html>
<head>
	<title>Caixa Eletrônico</title>
</head>
<body>
	<form method="POST">
		Agência:<br/>
		<input type="text" name="agencia" /><br/><br/>

		Conta:<br/>
		<input type="text" name="conta" /><br/><br/>

		Senha:<br/>
		<input type="password" name="senha" /><br/><br/>

		<input type="submit" value="Entrar" />
	</form>
</body>
</html>