<?php  

session_start();
include 'verifica_sessao.php';
include 'conexao.php';


$id_forma_pagamento = $_POST['id_forma_pagamento'];
$forma_pagamento = $_POST['forma_pagamento'];
$desc_pagamento = $_POST['desc_pagamento'];


$query = " UPDATE forma_pagamento SET FORMA_PAGAMENTO = '$forma_pagamento', DESC_FORMA_PAGAMENTO = '$desc_pagamento'
WHERE ID_FORMA_PAGAMENTO = '$id_forma_pagamento' ";

mysqli_query($conexao, $query);

header('location: views/forma_pagamento.php?sucesso2');


?>