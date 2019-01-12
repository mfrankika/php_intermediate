<?php
// objetivo - filtrar as caracteristicas mais usadas

try {
	$pdo = new PDO("mysql:dbname=projeto_tags;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

// pegar todos os registros bco 
$sql = "SELECT caracteristicas FROM usuarios";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$lista = $sql->fetchAll(); //array com todas caracteristicas

	// gerar as caracteristicas todas separadas
	$carac = array();

	// percorrer todos os usuarios com todas as palavras de cada usuario
	foreach($lista as $usuario) {

		//separar por , todas as palavras que existe no array 
		$palavras = explode(",", $usuario['caracteristicas']);
		
		foreach($palavras as $palavra) {
			// trim tira os espaços inicio e fim das palavras
			$palavra = trim($palavra);

			if(isset($carac[$palavra])) {
				// se a palavra ja existe aumente a repeticao desta palavra
				$carac[$palavra]++;
			} else {
				// se encontrou pela primeira vez a palavra recebe numero 1 de repeticao
				$carac[$palavra] = 1;
			}
		}
	}

	// ordenar o array do maior para o menor
	arsort($carac);

	// dividir as contagens das palavras
	$palavras = array_keys($carac); // todas as chaves do  array $carac 
	$contagens = array_values($carac); //guarda todas contagens

	$maior = max($contagens); //guarda o maior numero de um array 

	//criar tamanhos da letra diferente para a lista das palavras
	$tamanhos = array(11, 15, 20, 30);

	//exibir a quantidade de palavras, todas as palavras 
	for($x=0;$x<count($palavras);$x++) {

		// uma media baseada no numero maior (qt de palavras div 
		//pelo num maior - proporcao de cada uma das palavras)
		$n = $contagens[$x] / $maior;

		// encaixar cada palavra no maior tamanho
		$h = ceil($n * count($tamanhos)); //ceil arredonda para cima

		echo "<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$x]." (".$contagens[$x].")</p>";

	}





}











