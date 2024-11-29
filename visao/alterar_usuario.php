<?php
include_once('../controle/controle_session.php');
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
$idrequerido=$_GET['id_usuario'];
include('cabecalho.php');
$info_bd= busca_info_bd($conexao,'usuario','idUsuario',$idrequerido);
foreach($info_bd as $user){
    $nome=$user['nomeUsuario'];
    $turma=$user['turmaUsuario'];
    $idUsuario=$user['idUsuario'];
}

    ?>
      
<DOCTYPE html>  

    <head>
         
        
       
    
    <!--usa a tag container pra ficar ajeitado na tela-->
        <div class="container"> 
        <h2>ALTERE AS INFORMAÇÕES</h2>
    </div>
    </head>
    <body>
       <div class="container">  
             
       
       
       <!--layalt da tela pre pronto do bootstrep-->
        <form action="../controle/altera_usuario_controle.php" method="POST">
            <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario ?>">
            
            <div class="mb-3">
              <label for="turma" class="form-label">turma</label>
              <input type="text" required name ='turma'class="form-control" value="<?php echo $turma ?>" id="turma"class="form-control">
            </div>
            
              <div class="mb-3">
              <label for="nome" class="form-label">nome</label>
              <input type="text" required name ='nome'class="form-control" value="<?php echo $nome ?>" id="nome"class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">enviar</button>
          </form>
        </div>
    
    </body>
   

    
    
    
    
   








    
</DOCTYPE>