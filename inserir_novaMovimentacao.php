<?php  

session_start();
include 'conexao.php';

$id_usuario = $_SESSION['id_usuario'];


$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];
$data_pagamento =  $_POST['data_pagamento'];
$data_vencimento = $_POST['data_vencimento'];
$forma_pagamento = $_POST['forma_pagamento'];
$tipo = $_POST['tipo'];
$situacao = $_POST['situacao'];
$parcela = $_POST['parcela'];
$parcelado= $_POST['parcelado'];
$lancamento = $_POST['lancamento'];



// calcula se o lançamento vai ser uma despeza , se sim então o valor a ser salvo deve ser negativo.
if($lancamento == 'Despeza'){

	$novo_valor = $valor*(-1);

	$valor = $novo_valor;
}



if($parcela == 'Sim')
{
	$prestacao = $valor/$parcelado;

	$nova_data = explode('-', $data_vencimento);

	$ano1 = $nova_data[0];
	$mes1 = $nova_data[1];
	$dia1 = $nova_data[2];


	for ($i=0; $i <$parcelado ; $i++) { 

		$data1 = "$ano1-$mes1-$dia1";

		$query = "INSERT INTO movimentacoes (DESCRICAO, VALOR, CATEGORIA, DATA_PAGAMENTO, DATA_VENCIMENTO, FORMA_PAGAMENTO,
				TIPO, SITUACAO, PARCELA, PARCELADO, LANCAMENTO,idUSUARIO) VALUES ('$descricao', '$prestacao', '$categoria',
				'$data_pagamento','$data1', '$forma_pagamento', '$tipo', '$situacao', '$parcela', '$parcelado', '$lancamento',
				'$id_usuario')";

			mysqli_query($conexao,$query); 

			$data_pagamento = '0000-00-00';
			$situacao = 'Pendente';

			$mes1 = $mes1+1;

			if($mes1 > 12)
			{
				$ano1 = $ano1+1;
				$mes1 = 1;
			}							
}

	
header('location: views/novaMovimentacao.php?sucesso');
exit();
}


else{
$query = "INSERT INTO movimentacoes (DESCRICAO, VALOR, CATEGORIA, DATA_PAGAMENTO, DATA_VENCIMENTO, FORMA_PAGAMENTO,
			TIPO, SITUACAO, PARCELA, PARCELADO, LANCAMENTO, idUSUARIO) VALUES ('$descricao', '$valor', '$categoria','$data_pagamento',
			'$data_vencimento', '$forma_pagamento', '$tipo', '$situacao', '$parcela', '$parcelado', '$lancamento', '$id_usuario')";

mysqli_query($conexao,$query); 



header('location: views/novaMovimentacao.php?sucesso');
exit(); 
} 

?>