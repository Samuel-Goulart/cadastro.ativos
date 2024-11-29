<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');

$info= busca_info_bd($conexao,'ativos');
?>
<head> 
  <title>ativos cadastrados</title>
</head>
    <body>
       <div class="container">  
       <table class="table">
  <thead>
    <tr>
      <th scope="col">descrisao do ativo</th>
      <th scope="col">quantidade</th>
      <th scope="col">usuario do cadastro</th>
      <th scope="col">data do cadastro</th>
      <th scope="col">observação</th>
      <th scope="col">status</th>

    </tr>
    </thead>
    <body>
    <?php
    foreach($info as $user){
        ?>
        <tr>     
        <td>
                <?php echo $user['descriçaoAtivo'];?>
        </td>
        <td>    
            <?php echo $user['quantidadeAtivo'];?>
        </td>
        <td>
            <?php echo $user['usuarioCadastro'];?>
        </td>
        <td>
            <?php echo $user['dataCadastro'];?>
        </td>
        <td>
            <?php echo $user['observaçaoAtivo'];?>
        </td>
        <td>
            <?php echo $user['statusAtivo'];?>
        </td>
        
    </tr>
<?php
}
?>














    </body>