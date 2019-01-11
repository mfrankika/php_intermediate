<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Falhou a conexão: ".$e->getMessege();
} 

$sql = "SELECT * FROM fotos";
$sql = $pdo->query($sql);

echo "Total de Fotos: ".$sql->rowCount();

?>