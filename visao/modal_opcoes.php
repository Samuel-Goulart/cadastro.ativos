
<div class="modal fade " id="modal-opcoes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Cadastrar Marca</h1>
        <button type="button" class="btn-close fechar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
      <div class="mb-1 divSuperior" style="display:none;">
            <label for="recipient-name" class="col-form-label"> Superior</label>
            <div id="select"></div>
          </div>
 
          <div class="mb-3">
            <label for="descriçaoMarca" class="col-form-label">Descrição opcao</label>
            <input type="text" class="form-control" id="descricaoOpcao">
            <input type="hidden" class="form-control" id="idOpcao">
          </div>
          <div class="mb-3">
          <label for="nivelOpcao" class="col-form-label">cadastrar opções </label>
          <select  id='idNivel' name='nivel' class="form-select" aria-label="Default select example" onchange="exibesuperior(this)">
          <option value="">Selecione o tipo</option>
                <?php
                foreach ($nivel1 as $nivel2) {
                  echo '<option value="' . $nivel2['idNivel'] . '">' . $nivel2['descriçaoNivel'] . '</option>';
                }
                ?>
              </select>
          </div>
          <div class="mb-3">
            <label for="urlOpcao" class="col-form-label">Url</label>
            <input type="text" class="form-control" id="url">
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fechar" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary salvar btn_salva_info" >Salvar</button>
      </div>
    </div>
  </div>
</div>