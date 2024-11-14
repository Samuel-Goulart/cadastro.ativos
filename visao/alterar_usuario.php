<?php
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
$idrequerido=$_GET['id_usuario'];
$info_bd= busca_info_bd($conexao,'usuario','idUsuario',$idrequerido);
foreach($info_bd as $user){
    $nome=$user['nomeUsuario'];
    $turma=$user['turmaUsuario'];
    $idUsuario=$user['idUsuario'];
}

    ?>
      
<DOCTYPE html>  

    <head>
         
        
        <!--links do bootstrep-->
        <meta charset="UTF-8">
        <title> tela de cadastro</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
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