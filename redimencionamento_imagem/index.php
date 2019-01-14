<?php 
// 
$arquivo ="imagem.jpeg";
// os valores final da imagem apos redimencionada
$largura = 200;
$altura = 200;

// usar função list() para pegar tamanho imagem original
// getimagesize() vai retornar array com 2 propriedade
list($largura_original, $altura_original) = getimagesize($arquivo);

//proporção entre a larg e alt da imagem
$ratio = $largura_original / $altura_original;

echo $ratio;

echo "<hr>";

if($largura/$altura > $ratio){
	$largura = $altura * $ratio;
}else{
	$altura = $largura / $ratio;
}

// mostrar orginal e a proporcional
echo "Largura ". $largura. " - altura" .$altura;
echo "<hr>";

echo "Largura ". $largura_original. "- altura" .$altura_original;

//  criando uma imagem final
$imagem_final = imagecreatetruecolor($largura, $altura);

//pegando imagem original - imagemcreatefrom jpg/npg/jpeg
$imagem_original= imagecreatefromjpeg($arquivo);


//copiar a imagem rescrita - imagemcopyresized() so redimenciona 
//imagecopyresampled() é melhor 
//param - 4 zeros = posição que a imagem vai ficar canto superior esquerdo
// qual é o novo tamanho
imagecopyresampled($imagem_final, $imagem_original, 
	0, 0, 0, 0 , 
	$largura , $altura, $largura_original , $altura_original );

// transforma o arq php em arq de imagem 
header("Content-Type:image/jpeg");

// se imagem for jpeg - imagejpeg($imagem_final, null, 80)
// exibir na tela a imagem
imagejpeg($imagem_final, null,80);

?>