<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');

$info_bd= busca_info_bd($conexao,'usuario');

?>
<DOCTYPE html>  
    <head>
    <meta charset="UTF-8">
    <title> lista de usuarios</title>
    <!--usa a tag container pra ficar ajeitado na tela-->
        <div class="container"> 
        <h2>CADASTRO</h2>
    
    </head>
    <body>
       <div class="container">  
       <table class="table">
  <thead>
    <tr>
      <th scope="col">nome</th>
      <th scope="col">usuario</th>
      <th scope="col">turma</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($info_bd as $user){
        ?>
        <tr>     
            <td>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>">
                    <?php echo $user['nomeUsuario'];?>
                </a>
            </td>
            <td>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>"><!--puxa do banco -->
                <?php echo $user['usuario'];?>
                </a>
            </td>
            <td>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>">
                <?php echo $user['turmaUsuario'];?>
                </a>
            </td>
            
        </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
       </div>
       
       
       