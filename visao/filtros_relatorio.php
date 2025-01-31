<?php include('cabecalho.php');
include('menu_superior.php');
?>
<div class="container mt-4">
  <!-- Título da seção -->
  <h1 class="mb-4 text-center">Relatório de Movimentação</h1>

 
    <div class="card-body">
      <form>
        <!-- Linhas com 2 colunas: esquerda e direita -->
        <div class="row">
          <!-- Coluna da esquerda: Ativo, Marca, Usuário -->
          <div class="col-md-6 mb-3">
            <label for="ativo" class="form-label">Ativo</label>
            <select id="ativo" class="form-select">
              <option selected>Selecione o Ativo</option>
              <!-- Adicionar opções aqui -->
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="marca" class="form-label">Marca</label>
            <select id="marca" class="form-select">
              <option selected>Selecione a Marca</option>
              <!-- Adicionar opções aqui -->
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="tipo" class="form-label">tipo</label>
            <select id="tipo" class="form-select">
              <option selected>Selecione o tipo</option>
              <!-- Adicionar opções aqui -->
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="usuario" class="form-label">Usuário responsável pela movimentação</label>
            <select id="usuario" class="form-select">
              <option selected>Selecione o Usuário</option>
              <!-- Adicionar opções aqui -->
            </select>
          </div>
        </div>

        <div class="row">
          <!-- Coluna da direita: Data Inicial, Data Final, Tipo de Movimentação -->
          <div class="col-md-6 mb-3">
            <label for="data_inicial" class="form-label">Data Inicial</label>
            <input type="date" id="data_inicial" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label for="data_final" class="form-label">Data Final</label>
            <input type="date" id="data_final" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label for="tipo_mov" class="form-label">Tipo de Movimentação</label>
            <select id="tipo_mov" class="form-select">
              <option selected>Selecione o Tipo de Movimentação</option>
              <option>Adicionar</option>
              <option>Remover</option>
              <option>Realocar</option>
            </select>
          </div>
        </div>

        <!-- Botões fora da tabela -->
        <div class="d-flex justify-content-end mt-3">
          <button type="button" class="btn btn-secondary me-2" id="limpar_filtros">Limpar Filtros</button>
          <button type="button" class="btn btn-primary" id="gerar_relatorio">Gerar Relatório</button>
        </div>
      </form>
    </div>
  </div>
</div>
