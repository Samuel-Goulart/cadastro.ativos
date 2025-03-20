<form action="../controle/movimentacao.js" method="POST">
  <div class="modal fade " id="movimentaçoes" tabindex="-1" aria-labelledby="exampleModalLabel salva" aria-hidden="true">
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
                <label for="recipient-name" class="col-form-label">Ativo</label>
                <select id='ativo' name='marca' class="form-select" aria-label="Default select example">
                  <option selected>selecione o ativo</option>
                  <?php
                  foreach ($ativos as $ativo) {
                    echo '<option value="' . $ativo['idAtivo'] . '">' . $ativo['descriçaoAtivo'] . '</option>';
                  }
                  ?>

                </select>
              </div>

              <label for="recipient-name" class="col-form-label">cadastrar movimentação </label>
              <select id='tipo_mov' name='marca' class="form-select" aria-label="Default select example">
                <option selected>tipo de movimentação</option>
                <option>adicionar</option>
                <option>remover</option>
                <option>realocar</option>
              </select>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">quantidade</label>
              <input type="text" class="form-control" id="quantidade" name='quantidade'>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">local Origem</label>
              <input type="text" class="form-control" id="origem" name='origem'>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">local destino</label>
              <input type="text" class="form-control" id="destino" name='destino'>
            </div>
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">Descrição</label>
              <input type="text" class="form-control" id="descricao" name='descricao'>
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