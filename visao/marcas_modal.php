<?php
include('../controle/controle_session.php');
include('../controle/funcoes.php');
include('../modelo/conecta_banco_dados.php');

$title="marca";
include('menu_superior.php');
?>

<script src="../js/marcas.js"></script>
<h1 class="ml-5">marca</h1>
<body>
    <div class='container';>
        <div class="d-flex">
                

            <button type="button" class=" btn btn-primary cadastrar" data-bs-toggle="modal" data-bs-target="#exampleModal">cadastrar marca</botton>
        </div>
    </div>
</body>
       

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">descrição marca</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-1">
            <label for="recipient-name" class="col-form-label">descreva a marca </label>
            <input type="text" class="form-control" id="descriçaoMarca	" name='descriçaoMarca	'>
            <input type="hidden" class="form-control" id="idMarca	" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        <button type="button" class="btn btn-primary salvar">salvar</button>
      </div>
    </div>
  </div>
</div>
</html>
