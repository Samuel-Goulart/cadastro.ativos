<?php
session_start();
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');



?>
<DOCTYPE html>  
    <head>
      
         
        
        <!--links do bootstrep-->
        <meta charset="UTF-8">
        <title> cadastro</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--usa a tag container pra ficar ajeitado na tgela-->
        <div class="container"> 
        <h2>CADASTRO</h2>
    </div>
    </head>
    <body>
       <div class="container">  
             
       
       
       <!--layalt da tela pre pronto do bootstrep-->
        <form action="../controle/tela_cadastro_usuario_controle.php" method="POST">
            
            <div class="mb-3">
              <label for="turma" class="form-label">turma</label>
              <input type="text" required name ='turma'class="form-control" id="turma"class="form-control">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">usuario</label>
                <input type="text" required name ='usuario'class="form-control" id="usuario"class="form-control">
              </div>
              <div class="mb-3">
                <label for="senha" class="form-label">senha</label>
                <input type="text" required name ='senha'class="form-control" id="senha"class="form-control">
              </div><div class="mb-3">
              <label for="nome" class="form-label">nome</label>
              <input type="text" required name ='nome'class="form-control" id="nome"class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">enviar</button>
          </form>
        </div>
    
    </body>
    
    
    
    
    
   








    
</DOCTYPE>