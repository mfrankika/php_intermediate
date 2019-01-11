<?php
//receive the data that the user entered
	//1.open the session
session_start();

	//check if you've sent anything
if (isset($_POST['email'])&&empty($_POST['email'])==false) {
	$email=addslashes($_POST['email']);
	$senha=md5(addslashes($_POST['senha']));

	//check if user is on database
	$dsn="mysql:dbname=blog;host=localhost";
	$dbuser="root";
	$dbpass="";

	try{
	//connecting the PDO class x db 
       $db= new PDO ($dsn, $dbuser, $dbpass);

    //comparing data received in the database
       $sql=$db->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

    //check for result
       if ($sql->rowCount() > 0) {

        	//get the first data from the sql request
        	$dado=$sql -> fetch();

        	//only to check the array $dado
        	//print_r($dado);

        	//save the id in session
        	$_SESSION['id']=$dado['id'];

        	header("Location:index.php");
        }

	}catch(PDOException $e){
		echo "Falhou: ".$e->getMessage();
	}

}

?>

<form method="POST">
	E-mail:<br/>
	<input type="email" name="email"/><br><br>
	Senha:<br>
	<input type="password" name="senha"><br><br>
	<input type="submit" value="entrar">
</form>
