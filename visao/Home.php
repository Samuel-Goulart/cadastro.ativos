<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');
include_once('modal_ativos.php');
$marca= busca_info_bd($conexao,'marca');
$info= busca_info_bd($conexao,'ativos');
$sql="SELECT 
`idAtivo`,
`descriçaoAtivo`,
`quantidadeAtivo`,
`statusAtivo`,
`observaçaoAtivo`,
`dataCadastro`,
`usuarioCadastro`,
`idMarca`,
`idTipo`,
(SELECT descriçaoMarca FROM marca m WHERE m.idMarca = a.idMarca)as marca,
(SELECT descriçaoTipo from tipo t where t.idTipo = a.idTipo) as tipo,
(SELECT usuario from usuario u where u.idUsuario = a.usuarioCadastro) as usuario
FROM `ativos` a WHERE 1";
$result=mysqli_query($conexao,$sql)or die(false);
$ativos_bd=$result->fetch_all(MYSQLI_ASSOC);
?>
<head> 
<script src='../js/ativos.js'></script>
  <title>ativos cadastrados</title>
  <div class="container">
  <h1>ATIVOS</h1> 
  </div>
  <link rel="stylesheet" href="../css/home.cs">
</head>

    