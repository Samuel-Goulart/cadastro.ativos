<?php include('cabecalho.php');
include('menu_superior.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');

$ativos = busca_info_bd($conexao, 'ativos', 'statusAtivo', 'S');
$marca = busca_info_bd($conexao, 'marca', 'statusMarca', 'S');//consulta no banco 
$tipos = busca_info_bd($conexao, 'tipo', 'statusTipo', 'S');
$usuarios = busca_info_bd($conexao, 'usuario');
?>
<div class="container mt-4">
  <form action="resultado_relatorio.php" method="post"></form>
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
              <?php
                  foreach ($ativos as $ativo) {
                    echo '<option value="' . $ativo['idAtivo'] . '">' . $ativo['descriçaoAtivo'] . '</option>';
                  }
                  ?>

            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="marca" class="form-label">Marca</label>
            <select id="marca" class="form-select">
              <option selected>Selecione a Marca</option>
              <?php
              //esse e o foreach q pega as informaçoes da consulta la da linha 7
                  foreach ($marca as $marcas) {
                    echo '<option value="' . $marcas['idMarca'] . '">' . $marcas['descriçaoMarca'] . '</option>';
                  }
                  ?>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="tipo" class="form-label">tipo</label>
            <select id="tipo" class="form-select">
              <option selected>Selecione o tipo</option>
              <?php
                  foreach ($tipos as $tipo) {
                    echo '<option value="' . $tipo['idTipo'] . '">' . $tipo['descriçaoTipo'] . '</option>';
                  }
                  ?>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="usuario" class="form-label">Usuário responsável pela movimentação</label>
            <select id="usuario" class="form-select">
              <option selected>Selecione o Usuário</option>
              <?php
                  foreach ($usuarios as $usuario) {
                    echo '<option value="' . $usuario['idUsuario'] . '">' . $usuario['usuario'] . '</option>';
                  }
                  ?>
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
