<?php  

session_start();
include 'verifica_sessao.php';
include 'conexao.php';


$id_categoria = $_POST['id_categoria'];
$desc_categoria = $_POST['desc_categoria'];
$obs_categoria = $_POST['obs_categoria'];


$query = " UPDATE categoria SET DESC_CATEGORIA = '$desc_categoria', OBS_CATEGORIA = '$obs_categoria'
WHERE id_categoria = '$id_categoria' ";

mysqli_query($conexao, $query);

header('location: views/categorias.php?sucesso2');


?>