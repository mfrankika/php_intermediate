<?php
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

//receber o formulario
if(!empty($_POST['carro'])) {
	$carro = addslashes($_POST['carro']);

	// data no formato internacional
	$data_inicio = explode('/', addslashes($_POST['data_inicio']));
	$data_fim = explode('/', addslashes($_POST['data_fim']));
	$pessoa = addslashes($_POST['pessoa']);

	//transformando padrao br para inter as datas
	//reordenando os arrays data - [2]= ano, [1]= mes, [0]=dia
	$data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
	$data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];

	// se tem disponibilidade de reserva ....
	if($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
		$reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
		header("Location: index.php");
		exit;
	} else {
		echo "Este carro já está reservado neste período.";
	}

}

?>
<h1>Adicionar Reserva</h1>

<form method="POST">
	Carro:<br/>
	<select name="carro">
		<?php
		$lista = $carros->getCarros();

		foreach($lista as $carro):
			?>			
			<option value="<?php echo $carro['id']; ?>"><?php echo $carro['nome']; ?></option>
			
			<?php
		endforeach;		
		?>
	</select><br/><br/>
	
	<!-- periodo que vai reservar o carro -->
	Data de início:<br/>
	<input type="text" name="data_inicio" /><br/><br/>

	Data de fim:<br/>
	<input type="text" name="data_fim" /><br/><br/>

	Nome da pessoa:<br/>
	<input type="text" name="pessoa" /><br/><br/>

	<input type="submit" value="Reservar" />
</form>