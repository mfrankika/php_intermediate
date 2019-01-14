<?php

//receber dados do formulario
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        if(isset($_POST['email']) && !empty($_POST['email'])){
            if(isset($_POST['mensagem']) && !empty($_POST['mensagem'])){

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $mensagem = addslashes($_POST['mensagem']);

            //quem vai receber
            $para = "oliveira.mkika@gmail.com";
            $assunto = "Mensagem da página de Contato";
            $corpo = "Nome: ".$nome." - E-mail: ".$email." - Mensagem: ".$mensagem."";

            //quem enviou - \n ou \r = pular linha 
            $cabecalho = "From: mfrankika@gmail.com"."\r\n".
                         "Reply-To: ".$email."\r\n".
                         "X-Mailer: PHP/".phpversion();

            // enviar email
            mail($para, $assunto, $corpo, $cabecalho);

            echo "<h2>Email enviado com sucesso!</h2>";
            exit;
        }
    }
}
?>
<form method="POST">

    Nome: <br/>
    <input type="text" name="nome"/><br/></br>

    Email: <br/>
    <input type="email" name="email"/><br/></br>

    Mensagem> <br/>
    <textarea name="mensagem"></textarea><br/><br/>

    <input type="submit" value="Enviar" />

</form>