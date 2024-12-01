<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');
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
  <title>ativos cadastrados</title>
  <div class="container">
  <h1>ATIVOS</h1> 
  </div>
  <link rel="stylesheet" href="home.css">
</head>

    <body>
       <div class="container" style="background-color: white">  
       <table class="table">
  <thead>
    <tr>
      <th scope="col">descrisao do ativo</th>
      <th scope="col">quantidade</th>
      <th scope="col">usuario do cadastro</th>
      <th scope="col">data do cadastro</th>
      <th scope="col">observação</th>
      <th scope="col">status</th>
      <th scope="col">tipo</th>
      <th scope="col">marca</th>

    </tr>
    </thead>
    <body>
    <?php
    foreach($ativos_bd as $i){
        ?>
        <tr>     
        <td><?php echo $i['descriçaoAtivo'];?></td>
        <td><?php echo $i['quantidadeAtivo'];?></td>
        <td><?php echo $i['usuario'];?></td>
        <td><?php echo $i['dataCadastro'];?></td>
        <td><?php echo $i['observaçaoAtivo'];?></td>                                  
        <td><?php echo $i['statusAtivo'];?></td>
        <td><?php echo $i['tipo'];?></td>
        <td><?php echo $i['marca'];?></td>
        
    </tr>
<?php
}
?>














    </body>