<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
?>
        

    

        <style>
        /* Faz o dropdown abrir no hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* O menu deve estar oculto por padrão */
        .dropdown-menu {
            display: none;
        }
    </style>    
        
    </head>
<body>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex;justify-content: space-between;">==</button>

    <ul class="dropdown-menu">
      <li> 
        <h7>USUARIO</h7>
        <br>
          <a href="tela_cadastro_usuario.php">cadastro</a>
          <br>
          <a href="listar_usuario.php">lista dos usuarios</a>
          <br>
          
      </li>
      
    </ul>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
