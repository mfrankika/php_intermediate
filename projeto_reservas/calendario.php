<?php

/*
explicação calendario do arq index.php
$data = '2019-01';

// w diz dia da semana 0 = dom
$dia1 = data('w',strtotime($data.'-01'));
echo "primeiro Dia: ".$dia1."<br/>";

// quantidade de dias que o mes tem = t
$dias = date ('t', strtotime($data));
echo "Total dias: ".$dias."<br/>";

//quantas de linha que o calendario vai ter
$linhas = ceil(($dia1+$dias) / 7);
echo "LINHAS: ".$linhas."<br/>";

//qual é o primeiro dia de dom do calendario 
$dia1 = -$dia1; 

//a data de domingo do calendario mesmo que seja o mes anterior
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
echo " DATA INICIO DOMINGO :  ".$data_inicio."<br/>";

// ultima data do calendario ainda que seja o mes subsequente
//$data_fim = date('Y-m-d', strtotime(( ($dia1+todos os dia )).' days', srttotime($data)));
$data_fim = date('Y-m-d', strtotime(( ($dia1+ ($linhas*7)-1)).' days', srttotime($data)));
echo " DATA FIM: ".$data_fim "<br/>"; */

?>
<table border="1" width="100%">
	<tr>
		<th>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th>Sab</th>
	</tr>
	<?php for($l=0;$l<$linhas;$l++): ?>
		<tr>
			<?php for($q=0;$q<7;$q++): ?>
			<?php
			//$q dia da semana do segundo for
			$t = strtotime(($q+($l*7)).' days', strtotime($data_inicio));
			$w = date('Y-m-d', $t);
			?>
			<td><?php
			echo date('d/m', $t)."<br/><br/>";
			$w = strtotime($w);
			foreach($lista as $item) {
				$dr_inicio = strtotime($item['data_inicio']);
				$dr_fim = strtotime($item['data_fim']);

				//$w = data atual - colocar dentro da reserva nome pessoa e o carro reservado
				if( $w >= $dr_inicio && $w <= $dr_fim ) {
					echo $item['pessoa']." (".$item['id_carro'].")<br/>";
				}

			}
			?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>










