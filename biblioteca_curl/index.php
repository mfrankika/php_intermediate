<?php

//iniciar a biblioteca de requisição webserver, abrir a conexao
$ch = curl_init();

//dizer qual o endereço que vai requisitar
  /* param 1 a biblioteca
  /* param 2 comando de url
  /* param 3 dizer qual url webserver*/
curl_setopt($ch, CURLOPT_URL, "https://alunos.b7web.com.br/api/ping");

// dizer qual metodo de envio - 1 diz que é uma requisao tipo post
curl_setopt($ch, CURLOPT_POST, 1);

//definir os campos que vai ser enviado
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=Bonieky&idade=90&sexo=masculino");

//para receber a resposta do servidor
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//executar a requisição
$resposta = curl_exec($ch);

//fechar a conexao
curl_close($ch);

// saber o que foi que o servidor me retornou
print_r($resposta);

?>