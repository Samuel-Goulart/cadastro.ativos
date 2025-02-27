<form action="../controle/ativos_controller.php" method="POST" enctype="multipart/form-data"> <!-- Adiciona o enctype -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Ativo</h1>
          <button type="button" onclick="limpar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-1">
            <div class="mb-1">
              <label for="recipient-name" class="col-form-label">Descrição Ativo</label>
              <input type="text" class="form-control" id="ativo" name="ativo" required>
            </div>

            <label for="recipient-name" class="col-form-label">Cadastrar Marca</label>
            <select id="marca" name="marca" class="form-select" required>
              <option value="">Selecione a marca</option>
              <?php
              foreach ($marcas as $marca) {
                echo '<option value="' . $marca['idMarca'] . '">' . $marca['descriçaoMarca'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Tipo</label>
            <select id="tipo" name="tipo" class="form-select" required>
              <option value="">Selecione o tipo</option>
              <?php
              foreach ($tipos as $tipo) {
                echo '<option value="' . $tipo['idTipo'] . '">' . $tipo['descriçaoTipo'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" required>
          </div>

          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Quantidade Mínima</label>
            <input type="text" class="form-control" id="quantidadeMin" name="quantidadeMin" required>
          </div>

          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Observação Ativo</label>
            <input type="text" class="form-control" id="observacao" name="observacao" required>
          </div>

          <div class="mb-3">
            <label for="formFile" class="form-label">Imagem Ativo</label>
            <input class="form-control" accept="image/png, image/jpeg" type="file" id="imgAtivo" name="img" required> <!-- Campo obrigatório para imagem -->
          </div>

          <div class="mb-3 div_previer" style="display:none">
            <label class="form-label" for="formfile">Imagem</label>
            <img id="img_previer" style="width:150px; position:relative; left:20%;">
          </div>
        </div>
        
        
       <!-- Modal de Detalhes -->
<div class="modal fade" id="detalhesModal_<?php echo $i['idAtivo']; ?>" tabindex="-1" aria-labelledby="detalhesModalLabel_<?php echo $i['idAtivo']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detalhesModalLabel_<?php echo $i['idAtivo']; ?>">Detalhes do Ativo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>Descrição</th>
            <td class="descricaoAtivo"></td> <!-- Preenchido dinamicamente -->
          </tr>
          <tr>
            <th>Quantidade</th>
            <td class="quantidadeAtivo"></td> <!-- Preenchido dinamicamente -->
          </tr>
          <tr>
            <th>Quantidade Mínima</th>
            <td class="quantidadeMinAtivo"></td> <!-- Preenchido dinamicamente -->
          </tr>
          <tr>
            <th>Observação</th>
            <td class="observacaoAtivo"></td> <!-- Preenchido dinamicamente -->
          </tr>
          <tr>
            <th>Imagem</th>
            <td><img class="imgAtivo" src="" alt="Imagem do Ativo" style="width: 100px; height: auto;"></td> <!-- Preenchido dinamicamente -->
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>
</form>