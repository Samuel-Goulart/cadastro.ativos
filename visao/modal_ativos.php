<form action="../controle/ativos_controller.php" method="POST">
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">cadastrar ativo</h1>
          <button type="button" onclick="limpar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-1">
              <div class="mb-1">
                <label for="recipient-name" class="col-form-label">descrisao ativo</label>
                <input type="text" class="form-control" id="ativo" name="ativo">
              </div>


              <label for="recipient-name" class="col-form-label">cadastrar marca</label>
              <select id='marca' name='marca' class="form-select" aria-label="Default select example">
                <option selected>selecione a marca </option>
                <?php

                foreach ($marcas as $marca) {
                  echo '<option value ="' . $marca['idMarca'] . '">' . $marca['descriçaoMarca'] . '</option>';
                }
                ?>

              </select>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">tipo</label>
              <select id='tipo' name='tipo' class="form-select" aria-label="Default select example">
                <?php
                foreach ($tipos as $tipo) {
                  echo '<option value ="' . $tipo['idTipo'] . '">' . $tipo['descriçaoTipo'] . '</option>';
                }
                ?>

              </select>
            </div>

            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">quantidade</label>
              <input type="text" class="form-control" id="quantidade" name='quantidade'>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">Observaçao ativo</label>
              <input type="text" class="form-control" id="observacao" name='observacao'>
            </div>
            <div class="mb-3 div_previer" style="display:none">
              <label class="form-label" for="formfile">imagem</label>
              <img id="img_previer" style="width:150px; position:relative;left:20%;">
              
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id='salva_info'>Send </button>
        </div>
      </div>
    </div>
  </div>