<?php 

include 'conexao.php';


if(isset($_GET['editar']))
{

$id_financas = $_POST['id_financas'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];
$data_pagamento = $_POST['data_pagamento'];
$data_vencimento = $_POST['data_vencimento'];
$forma_pagamento = $_POST['forma_pagamento'];
$tipo = $_POST['tipo'];
$situacao = $_POST['situacao'];



$query = "UPDATE movimentacoes SET DESCRICAO = '$descricao', VALOR = '$valor', CATEGORIA = '$categoria',
	DATA_PAGAMENTO = '$data_pagamento', DATA_VENCIMENTO = '$data_vencimento', FORMA_PAGAMENTO = '$forma_pagamento',
	TIPO = '$tipo', SITUACAO = '$situacao' WHERE idFINANCAS = '$id_financas' ";

	mysqli_query($conexao, $query);

	header('location: views/movimentacoes.php?sucesso1');
}



// ------------------------------------------------------------------------------------------------------------- //

// exluir registro da tabela movimentacoes

if (isset($_GET['excluir']))

{

  $query = "SELECT * FROM movimentacoes";
  $resultado = mysqli_query($conexao, $query);

  while($linha = mysqli_fetch_array($resultado)){

    if($linha['idFINANCAS'] == $_GET['excluir']){

      $id_financas = $linha['idFINANCAS'];       
    }

  }

      $query = "DELETE FROM movimentacoes WHERE idFINANCAS = '$id_financas'";
      mysqli_query($conexao, $query);

      header('location: views/movimentacoes.php?sucesso2'); 

      
}

 ?>



