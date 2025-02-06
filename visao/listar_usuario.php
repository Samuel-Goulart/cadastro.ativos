<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');

$admin=$_SESSION['admin'];
$info_bd= busca_info_bd($conexao,'usuario');
?>
<DOCTYPE html>  
    <head>
    <meta charset="UTF-8">
    <title> lista de usuarios</title>
    <!--usa a tag container pra ficar ajeitado na tela-->
        <div class="container"> 
        <h2>usuarios cadastrados</h2>
    
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
                <?php
                if($admin=='S'){
                ?>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>">
                    <?php echo $user['nomeUsuario'];?></a>
                <?php
                }else{
                    echo $user['nomeUsuario'];
                }
                ?>
        
            </td>
            <td>
            <?php
                if($admin=='S'){
                ?>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>">
                    <?php echo $user['usuario'];?></a>
                <?php
                }else{
                    echo $user['usuario'];
                }
                ?>
            </td>
            <td>
            <?php
                if($admin=='S'){
                ?>
                <a href="alterar_usuario.php?id_usuario=<?php echo $user['idUsuario']?>">
                    <?php echo $user['usuario'];?></a>
                <?php
                }else{
                    echo $user['turmaUsuario'];
                }
                ?>
            </td>
            
        </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
       </div>
       
       
       